<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenilaianTataRiasResource\Pages;
use App\Models\PenilaianTataRias;
use App\Models\AspekTataRias;
use App\Models\Peserta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PenilaianTataRiasResource extends Resource
{
    protected static ?string $model = PenilaianTataRias::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'Penilaian — Tata Rias';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Penilaian Tata Rias';
    protected static ?string $modelLabel = 'Penilaian Tata Rias';
    protected static ?string $pluralModelLabel = 'Penilaian Tata Rias';
    protected static bool $shouldRegisterNavigation = true;


    public static function form(Form $form): Form
    {
        return $form->schema([
            // CREATE ONLY
            Select::make('id_peserta')
                ->label('Pilih Peserta')
                ->options(function () {
                    return Peserta::query()
                        ->whereDoesntHave('penilaianTataRias', function ($q) {
                            $q->where('id_user', auth()->id());
                        })
                        ->orderBy('tingkat')
                        ->orderBy('no_tampil')
                        ->get()
                        ->mapWithKeys(function ($p) {
                            $label = strtoupper($p->tingkat) . ' · ' .
                                str_pad($p->no_tampil, 2, '0', STR_PAD_LEFT) .
                                ' — ' . $p->nama;
                            return [$p->id => $label];
                        })
                        ->toArray();
                })
                ->searchable()
                ->preload()
                ->required(fn(string $operation) => $operation === 'create')
                ->hiddenOn('edit')
                ->columnSpanFull(),

            // EDIT ONLY
            Placeholder::make('info_peserta')
                ->label('Peserta')
                ->content(function (?Model $record) {
                    if (!$record) return '-';
                    $record->loadMissing('peserta');
                    $p = $record->peserta;
                    if (!$p) return '-';
                    return strtoupper($p->tingkat) . ' · ' .
                        str_pad($p->no_tampil, 2, '0', STR_PAD_LEFT) .
                        ' — ' . $p->nama;
                })
                ->visibleOn('edit')
                ->columnSpanFull(),

            Repeater::make('penilaian_items')
                ->label('Penilaian Per Aspek')
                ->schema([
                    Hidden::make('id_aspek'),

                    Forms\Components\Section::make(function (callable $get) {
                        $aspek = AspekTataRias::find($get('id_aspek'));
                        return $aspek?->nama_penilaian ?? 'Aspek Penilaian';
                    })
                        ->schema([
                            Radio::make('nilai')
                                ->label('Pilih Nilai')
                                ->options(function (callable $get) {
                                    $aspekId = $get('id_aspek');
                                    if (!$aspekId) return [];
                                    $a = AspekTataRias::find($aspekId);
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
                    return AspekTataRias::all()->map(fn($a) => [
                        'id_aspek' => $a->id,
                        'nilai'    => null,
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
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('penilai.name')
                ->label('Penilai')
                ->searchable()
                ->sortable(),
        ];

        foreach (AspekTataRias::all() as $aspek) {
            $columns[] = Tables\Columns\TextColumn::make("aspek_{$aspek->id}")
                ->label($aspek->nama_penilaian)
                ->getStateUsing(function ($record) use ($aspek) {
                    $nilai = PenilaianTataRias::where('id_peserta', $record->id_peserta)
                        ->where('id_user', $record->id_user)
                        ->where('id_aspek', $aspek->id)
                        ->value('nilai');

                    return $nilai ?? '-';
                })
                ->alignCenter();
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
                            ->from('penilaian_tata_rias')
                            ->groupBy('id_peserta', 'id_user');
                    });
            })
            ->columns($columns)
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('deleteGroup')
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        \App\Models\PenilaianTataRias::where('id_peserta', $record->id_peserta)
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
                            \App\Models\PenilaianTataRias::where('id_peserta', $record->id_peserta)
                                ->where('id_user', $record->id_user)
                                ->delete();
                        }
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }
    public static function getNavigationItems(): array
    {
        return [
            \Filament\Navigation\NavigationItem::make('Tata Rias — Semua')
                ->group(static::getNavigationGroup())
                ->icon(static::getNavigationIcon())
                ->url(static::getUrl('index')),

            \Filament\Navigation\NavigationItem::make('Tata Rias — SD')
                ->group(static::getNavigationGroup())
                ->icon('heroicon-o-academic-cap')
                ->url(static::getUrl('sd')),

            \Filament\Navigation\NavigationItem::make('Tata Rias — SLTP')
                ->group(static::getNavigationGroup())
                ->icon('heroicon-o-academic-cap')
                ->url(static::getUrl('sltp')),

            \Filament\Navigation\NavigationItem::make('Tata Rias — SLTA')
                ->group(static::getNavigationGroup())
                ->icon('heroicon-o-academic-cap')
                ->url(static::getUrl('slta')),

        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPenilaianTataRias::route('/'),
            'sd'     => Pages\ListPenilaianTataRiasSD::route('/sd'),
            'sltp'   => Pages\ListPenilaianTataRiasSLTP::route('/sltp'),
            'slta'   => Pages\ListPenilaianTataRiasSLTA::route('/slta'),
            'create' => Pages\CreatePenilaianTataRias::route('/create'),
            'edit'   => Pages\EditPenilaianTataRias::route('/{record}/edit'),
        ];
    }
}
