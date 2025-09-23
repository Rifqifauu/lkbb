<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenilaianPBBResource\Pages;
use App\Models\AspekPBB;
use App\Models\PenilaianPBB;
use App\Models\Peserta;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PenilaianPBBResource extends Resource
{
    protected static ?string $model = PenilaianPBB::class;

    protected static ?string $navigationIcon   = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'Penilaian - 01. PBB';
    // protected static ?int    $navigationSort   = 8;
    protected static ?string $navigationLabel  = 'Penilaian PBB';
    protected static ?string $modelLabel       = 'Penilaian PBB';
    protected static ?string $pluralModelLabel = 'Penilaian PBB';
    protected static bool $shouldRegisterNavigation = true;

    /** Map tingkat Peserta -> tingkat AspekPBB */
    public static function mapToAspekTingkat(?string $tingkat): string
    {
        return $tingkat === 'sd' ? 'sd' : 'sltp_slta';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            // CREATE ONLY
            Select::make('tingkat_picker')
                ->label('Pilih Tingkat')
                ->options(['sd' => 'SD', 'sltp' => 'SLTP', 'slta' => 'SLTA'])
                ->live()
                ->required(fn (string $operation) => $operation === 'create')
                ->dehydrated(false)   // bukan kolom DB
                ->afterStateUpdated(function ($state, callable $set) {
                    // Ketika tingkat diubah, rebuild item aspek sesuai kategori
                    $aspekTingkat = static::mapToAspekTingkat($state);
                    $items = AspekPBB::where('tingkat', $aspekTingkat)
                        ->orderBy('id')
                        ->get()
                        ->map(fn ($a) => [
                            'id_aspek'   => $a->id,
                            'nama_aspek' => $a->nama_penilaian,
                            'nilai'      => null,
                        ])->toArray();

                    $set('penilaian_items', $items);
                })
                ->hiddenOn('edit'),

            Select::make('id_peserta')
                ->label('Pilih Peserta (No. Urut — Nama)')
                ->options(function (Get $get) {
                    $tingkat = $get('tingkat_picker');

                    return Peserta::query()
                        ->when($tingkat, fn ($q) => $q->where('tingkat', $tingkat))
                        ->whereDoesntHave('penilaianPbb', fn ($q) => $q->where('id_user', auth()->id()))
                        ->orderBy('no_tampil')
                        ->get()
                        ->mapWithKeys(function (Peserta $p) {
                            $label = strtoupper($p->tingkat) . ' · ' . str_pad($p->no_tampil, 2, '0', STR_PAD_LEFT) . ' — ' . $p->nama;
                            return [$p->id => $label];
                        })
                        ->toArray();
                })
                ->searchable()
                ->preload()
                ->live()
                ->required(fn (string $operation) => $operation === 'create')
                ->dehydrated(fn (string $operation) => $operation === 'create')
                ->hiddenOn('edit')
                ->columnSpanFull(),

            // EDIT ONLY - Info Peserta
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

            // PENILAIAN PER ASPEK
            Repeater::make('penilaian_items')
                ->label('Penilaian Per Aspek')
                ->schema([
                    Hidden::make('id_aspek'),

                    Section::make(fn (Get $get) =>
                        AspekPBB::find($get('id_aspek'))?->nama_penilaian ?? 'Aspek Penilaian'
                    )->schema([
                        Radio::make('nilai')
                            ->label('Pilih Nilai')
                            ->nullable()
                            ->hint('Kosongkan jika peserta tidak menampilkan gerakan')
                            ->options(function (Get $get) {
                                $a = AspekPBB::find($get('id_aspek'));
                                if (!$a) return [];
                                return [
                                    (int) $a->kurang_1 => "Kurang 1 ({$a->kurang_1} poin)",
                                    (int) $a->kurang_2 => "Kurang 2 ({$a->kurang_2} poin)",
                                    (int) $a->kurang_3 => "Kurang 3 ({$a->kurang_3} poin)",
                                    (int) $a->cukup_1  => "Cukup 1 ({$a->cukup_1} poin)",
                                    (int) $a->cukup_2  => "Cukup 2 ({$a->cukup_2} poin)",
                                    (int) $a->cukup_3  => "Cukup 3 ({$a->cukup_3} poin)",
                                    (int) $a->baik_1   => "Baik 1 ({$a->baik_1} poin)",
                                    (int) $a->baik_2   => "Baik 2 ({$a->baik_2} poin)",
                                    (int) $a->baik_3   => "Baik 3 ({$a->baik_3} poin)",
                                ];
                            })
                            ->columns(['default' => 1, 'sm' => 3, 'lg' => 3])
                            ->inline(false),
                    ]),
                ])
                ->disableItemCreation()
                ->disableItemDeletion()
                ->disableItemMovement()
                ->collapsible()
                // default awal: jika user sudah pilih tingkat → pakai filter; kalau belum, kosongkan
                ->default(function (Get $get) {
                    $tingkatPicker = $get('tingkat_picker'); // hanya ada di create
                    if (!$tingkatPicker) {
                        return []; // biarkan kosong sampai tingkat dipilih
                    }
                    $aspekTingkat = static::mapToAspekTingkat($tingkatPicker);
                    return AspekPBB::where('tingkat', $aspekTingkat)
                        ->orderBy('id')
                        ->get()
                        ->map(fn ($a) => [
                            'id_aspek'   => $a->id,
                            'nama_aspek' => $a->nama_penilaian,
                            'nilai'      => null,
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
                ->color(fn ($state) => match ($state) {
                    'sltp' => 'danger',
                    'slta' => 'success',
                    default => 'gray',
                })
                ->formatStateUsing(fn ($state) => strtoupper($state)),

            Tables\Columns\TextColumn::make('peserta.nama')
                ->label('Peserta')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('penilai.name')
                ->label('Penilai')
                ->sortable()
                ->searchable(),
        ];

        // kolom dinamis per aspek (semua aspek yang ada)
        foreach (AspekPBB::orderBy('id')->get() as $aspek) {
            $columns[] = Tables\Columns\TextColumn::make('aspek_' . $aspek->id)
                ->label($aspek->nama_penilaian)
                ->alignCenter()
                ->getStateUsing(function ($record) use ($aspek) {
                    $row = PenilaianPBB::where('id_peserta', $record->id_peserta)
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
                            ->from('penilaian_pbb')
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
                Action::make('deleteGroup')
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        PenilaianPBB::where('id_peserta', $record->id_peserta)
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
                            PenilaianPBB::where('id_peserta', $record->id_peserta)
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
            NavigationItem::make('PBB — Semua')
                ->group(static::getNavigationGroup())
                ->icon(static::getNavigationIcon())
                ->url(static::getUrl('index')),

            NavigationItem::make('PBB — SD')
                ->group(static::getNavigationGroup())
                ->icon('heroicon-o-academic-cap')
                ->url(static::getUrl('sd')),

            NavigationItem::make('PBB — SLTP')
                ->group(static::getNavigationGroup())
                ->icon('heroicon-o-academic-cap')
                ->url(static::getUrl('sltp')),

            NavigationItem::make('PBB — SLTA')
                ->group(static::getNavigationGroup())
                ->icon('heroicon-o-academic-cap')
                ->url(static::getUrl('slta')),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenilaianPBBs::route('/'),
            'sd'    => Pages\ListPenilaianPBBSd::route('/sd'),
            'sltp'  => Pages\ListPenilaianPBBSltp::route('/sltp'),
            'slta'  => Pages\ListPenilaianPBBSlta::route('/slta'),
            'create' => Pages\CreatePenilaianPBB::route('/create'),
            'edit'   => Pages\EditPenilaianPBB::route('/{record}/edit'),
        ];
    }
}
