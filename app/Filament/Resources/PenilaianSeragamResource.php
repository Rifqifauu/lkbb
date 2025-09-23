<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenilaianSeragamResource\Pages;
use App\Models\PenilaianSeragam;
use App\Models\AspekSeragam;
use App\Models\Peserta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Radio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PenilaianSeragamResource extends Resource
{
    protected static ?string $model = PenilaianSeragam::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'Penilaian — Seragam';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Penilaian Kostum';
    protected static ?string $modelLabel = 'Penilaian Kostum';
    protected static ?string $pluralModelLabel = 'Penilaian Kostum';
    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('id_peserta')   //Filter supaya peserta yang sudah dinilai oleh juri (user login) tidak muncul lagi di dropdown.
                ->label('Pilih Peserta')
                ->options(function () {
                    return Peserta::query()
                        ->whereDoesntHave('penilaianSeragam', function ($q) {
                            $q->where('id_user', auth()->id());
                        })
                        ->orderBy('tingkat')
                        ->orderBy('no_tampil')
                        ->get()
                        ->mapWithKeys(function ($p) {
                            $label = strtoupper($p->tingkat) . ' · ' . str_pad($p->no_tampil, 2, '0', STR_PAD_LEFT) . ' — ' . $p->nama;
                            return [$p->id => $label];
                        })
                        ->toArray();
                })
                ->searchable()
                ->preload()
                ->required(fn(string $operation) => $operation === 'create')
                ->hiddenOn('edit')
                ->columnSpanFull(),
            Placeholder::make('info_peserta')
                ->label('Peserta')
                ->content(function (?Model $record) {
                    if (!$record) return '-';
                    $record->loadMissing('peserta');
                    $p = $record->peserta;
                    if (!$p) return '-';
                    return strtoupper($p->tingkat) . ' · ' . str_pad($p->no_tampil, 2, '0', STR_PAD_LEFT) . ' — ' . $p->nama;
                })
                ->visibleOn('edit')
                ->columnSpanFull(),



            Repeater::make('penilaian_items')
                ->label('Penilaian Per Aspek')
                ->schema([
                    Hidden::make('id_aspek'),

                    Forms\Components\Section::make(function (callable $get) {
                        $aspek = AspekSeragam::find($get('id_aspek'));
                        return $aspek?->nama_penilaian ?? 'Aspek Penilaian';
                    })
                        ->schema([
                            Radio::make('nilai')
                                ->label('Pilih Nilai')
                                ->options(function (callable $get) {
                                    $aspekId = $get('id_aspek');
                                    if (!$aspekId) return [];
                                    $a = \App\Models\AspekSeragam::find($aspekId);
                                    if (!$a) return [];

                                    return [
                                        $a->kurang_1 => "Kurang 1 ({$a->kurang_1} poin)",
                                        $a->kurang_2 => "Kurang 2 ({$a->kurang_2} poin)",
                                        $a->kurang_3 => "Kurang 3 ({$a->kurang_3} poin)",
                                        $a->cukup_1  => "Cukup 1 ({$a->cukup_1} poin)",
                                        $a->cukup_2  => "Cukup 2 ({$a->cukup_2} poin)",
                                        $a->cukup_3  => "Cukup 3 ({$a->cukup_3} poin)",
                                        $a->baik_1   => "Baik 1 ({$a->baik_1} poin)",
                                        $a->baik_2   => "Baik 2 ({$a->baik_2} poin)",
                                        $a->baik_3   => "Baik 3 ({$a->baik_3} poin)",
                                    ];
                                })
                                ->nullable()
                                ->columns(['default' => 1, 'sm' => 3, 'lg' => 3])
                                ->inline(false),

                        ]),
                ])
                ->disableItemCreation()
                ->disableItemDeletion()
                ->disableItemMovement()
                ->collapsible()
                ->default(function () {
                    return AspekSeragam::all()->map(fn($aspek) => [
                        'id_aspek' => $aspek->id,
                        'nama_aspek' => $aspek->nama_penilaian,
                        'nilai' => null,
                    ])->toArray();
                })
                ->columnSpanFull(),

        ]);
    }

    public static function table(Table $table): Table
    {
        $columns = [
            Tables\Columns\TextColumn::make('peserta.no_tampil')
                ->label('No Urut.')
                ->sortable(),

            Tables\Columns\TextColumn::make('peserta.tingkat')
                ->label('Tingkat')
                ->badge()
                ->color(fn($state) => match ($state) {
                    'sltp' => 'danger',
                    'slta' => 'success',
                    default => 'gray',
                })
                ->formatStateUsing(fn($state) => strtoupper($state)),
            Tables\Columns\TextColumn::make('peserta.nama')
                ->label('Peserta')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('penilai.name')
                ->label('Penilai')
                ->sortable()
                ->searchable(),
        ];

        // kolom dinamis per aspek
        foreach (AspekSeragam::orderBy('id')->get() as $aspek) {
            $columns[] = Tables\Columns\TextColumn::make('aspek_' . $aspek->id)
                ->label($aspek->nama_penilaian)
                ->alignCenter()
                ->getStateUsing(function ($record) use ($aspek) {
                    $row = PenilaianSeragam::where('id_peserta', $record->id_peserta)
                        ->where('id_user', $record->id_user)
                        ->where('id_aspek', $aspek->id)
                        ->first();

                    return $row?->nilai ?? '-';
                });
        }

        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $user = Auth::user();

                if (!$user->hasAnyRole(['super_admin', 'admin panitia'])) {
                    $query->where('id_user', $user->id);
                }

                $query->with(['peserta', 'penilai'])
                    ->whereIn('id', function ($sub) {
                        $sub->selectRaw('MIN(id)')
                            ->from('penilaian_seragam')
                            ->groupBy('id_peserta', 'id_user');
                    });
            })
            ->columns($columns)
            ->filters([
                Tables\Filters\SelectFilter::make('id_peserta')
                    ->label('Filter Peserta')
                    ->options(Peserta::orderBy('nama')->pluck('nama', 'id')->toArray()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('deleteGroup')
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        PenilaianSeragam::where('id_peserta', $record->id_peserta)
                            ->where('id_user', $record->id_user)
                            ->delete();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('deleteGroup')
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function ($records) {
                        foreach ($records as $record) {
                            PenilaianSeragam::where('id_peserta', $record->id_peserta)
                                ->where('id_user', $record->id_user)
                                ->delete();
                        }
                    }),
            ]);
    }

    //supaya bisa split menu
    public static function getNavigationItems(): array
    {
        return [
            \Filament\Navigation\NavigationItem::make('Seragam — Semua')
                ->group(static::getNavigationGroup())
                ->icon(static::getNavigationIcon())
                ->url(static::getUrl('index')),

            \Filament\Navigation\NavigationItem::make('Seragam — SD')
                ->group(static::getNavigationGroup())
                ->icon('heroicon-o-academic-cap')
                ->url(static::getUrl('sd')),

            \Filament\Navigation\NavigationItem::make('Seragam — SLTP')
                ->group(static::getNavigationGroup())
                ->icon('heroicon-o-academic-cap')
                ->url(static::getUrl('sltp')),

            \Filament\Navigation\NavigationItem::make('Seragam — SLTA')
                ->group(static::getNavigationGroup())
                ->icon('heroicon-o-academic-cap')
                ->url(static::getUrl('slta')),
            
        ];
    }



    public static function getRelations(): array
    {
        return [];
    }

    //panggil routenya disini
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenilaianSeragams::route('/'),
            'sd'     => Pages\ListPenilaianSeragamSD::route('/sd'),
            'sltp'   => Pages\ListPenilaianSeragamSLTP::route('/sltp'),
            'slta'   => Pages\ListPenilaianSeragamSLTA::route('/slta'),
            'create' => Pages\CreatePenilaianSeragam::route('/create'),
            'edit' => Pages\EditPenilaianSeragam::route('/{record}/edit'),
        ];
    }
}
