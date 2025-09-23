<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenilaianDantonResource\Pages;
use App\Models\PenilaianDanton;
use App\Models\AspekDanton;
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
use Filament\Forms\Components\Radio;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Model;

class PenilaianDantonResource extends Resource
{
    protected static ?string $model = PenilaianDanton::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'Penilaian — Danton';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Penilaian Danton';
    protected static ?string $modelLabel = 'Penilaian Danton';
    protected static ?string $pluralModelLabel = 'Penilaian Danton';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('tingkat_picker')
                ->label('Pilih Tingkat')
                ->options([
                    'sd'   => 'SD',
                    'sltp' => 'SLTP',
                    'slta' => 'SLTA',
                ])
                ->live()
                ->required(fn(string $operation) => $operation === 'create')
                ->dehydrated(false)
                ->hiddenOn('edit'),

            // CREATE ONLY - Pilih Peserta
            Select::make('id_peserta')
                ->label('Pilih Peserta (No. Urut — Nama)')
                ->options(function (Get $get) {
                    $tingkat = $get('tingkat_picker');

                    return Peserta::query()
                        ->when($tingkat, fn($q) => $q->where('tingkat', $tingkat))
                        ->whereDoesntHave('penilaianDanton', fn($q) => $q->where('id_user', auth()->id()))
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
                ->dehydrated(fn(string $operation) => $operation === 'create')
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


            Repeater::make('penilaian_items')
                ->label('Penilaian Per Aspek')
                ->schema([
                    Hidden::make('id_aspek'),
                    Forms\Components\Section::make(function (callable $get) {
                        $aspek = AspekDanton::find($get('id_aspek'));
                        return $aspek?->nama_penilaian ?? 'Aspek Penilaian';
                    })->schema([
                        Radio::make('nilai')
                            ->label('Pilih Nilai')
                            ->options(function (callable $get) {
                                $aspekId = $get('id_aspek');
                                if (!$aspekId) return [];
                                $a = AspekDanton::find($aspekId);
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
                ->default(
                    fn() =>
                    AspekDanton::all()->map(fn($a) => [
                        'id_aspek' => $a->id,
                        'nilai'    => null,
                    ])->toArray()
                )
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        // >>> Versi PR (dipertahankan)
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

        foreach (AspekDanton::all() as $aspek) {
            $columns[] = Tables\Columns\TextColumn::make("aspek_{$aspek->id}")
                ->label($aspek->nama_penilaian)
                ->getStateUsing(function ($record) use ($aspek) {
                    $nilai = PenilaianDanton::where('id_peserta', $record->id_peserta)
                        ->where('id_user', $record->id_user)
                        ->where('id_aspek', $aspek->id)
                        ->value('nilai');

                    if ($nilai === null || $nilai === '') return '-';

                    if (is_numeric($nilai)) return (string) $nilai;

                    return match ($nilai) {
                        'kurang_1' => $aspek->kurang_1 ?? 0,
                        'kurang_2' => $aspek->kurang_2 ?? 0,
                        'kurang_3' => $aspek->kurang_3 ?? 0,
                        'cukup_1'  => $aspek->cukup_1  ?? 0,
                        'cukup_2'  => $aspek->cukup_2  ?? 0,
                        'cukup_3'  => $aspek->cukup_3  ?? 0,
                        'baik_1'   => $aspek->baik_1   ?? 0,
                        'baik_2'   => $aspek->baik_2   ?? 0,
                        'baik_3'   => $aspek->baik_3   ?? 0,
                        default    => (string) $nilai,
                    };
                })
                ->alignCenter();
        }

        return $table
            // ->query(
            //     PenilaianDanton::query()->with(['peserta', 'penilai', 'aspek'])
            // )
            // ->modifyQueryUsing(function (Builder $query) {
            //     $user    = Auth::user();
            //     $isAdmin = $user->hasAnyRole('super_admin', 'admin panitia')
            //         || $user->can('view all penilaian');

            //     if (! $isAdmin) {
            //         $query->where('id_user', $user->id);
            //     }

            //     $tableName = (new PenilaianDanton)->getTable();

            //     $query->selectRaw("MIN(id) AS id, id_peserta, id_user")
            //         ->from($tableName)
            //         ->groupBy('id_peserta', 'id_user')
            //         ->orderBy('id_peserta')
            //         ->orderBy('id_user');
            // })
            ->modifyQueryUsing(function (Builder $query) {
                $user    = Auth::user();
                $isAdmin = $user->hasAnyRole('super_admin', 'admin panitia')
                    || $user->can('view all penilaian');

                if (! $isAdmin) {
                    $query->where('id_user', $user->id);
                }

                $tableName = (new PenilaianDanton)->getTable();

                $query->selectRaw("MIN(id) AS id, id_peserta, id_user")
                    ->from($tableName)
                    ->groupBy('id_peserta', 'id_user')
                    ->orderBy('id_peserta')
                    ->orderBy('id_user');
            })

            ->defaultSort('id_peserta')
            ->columns($columns)
            ->filters([
                Tables\Filters\SelectFilter::make('id_peserta')
                    ->label('Filter Peserta')
                    ->options(Peserta::pluck('nama', 'id')->toArray()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getNavigationItems(): array
    {
        return [
            \Filament\Navigation\NavigationItem::make('Danton — Semua')
                ->group(static::getNavigationGroup())
                ->icon(static::getNavigationIcon())
                ->url(static::getUrl('index')),

            \Filament\Navigation\NavigationItem::make('Danton — SD')
                ->group(static::getNavigationGroup())
                ->icon('heroicon-o-academic-cap')
                ->url(static::getUrl('sd')),

            \Filament\Navigation\NavigationItem::make('Danton — SLTP')
                ->group(static::getNavigationGroup())
                ->icon('heroicon-o-academic-cap')
                ->url(static::getUrl('sltp')),

            \Filament\Navigation\NavigationItem::make('Danton — SLTA')
                ->group(static::getNavigationGroup())
                ->icon('heroicon-o-academic-cap')
                ->url(static::getUrl('slta')),
        ];
    }


    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPenilaianDantons::route('/'),
            'sd'     => Pages\ListPenilaianDantonSD::route('/sd'),
            'sltp'   => Pages\ListPenilaianDantonSLTP::route('/sltp'),
            'slta'   => Pages\ListPenilaianDantonSLTA::route('/slta'),
            'create' => Pages\CreatePenilaianDanton::route('/create'),
            'edit'   => Pages\EditPenilaianDanton::route('/{record}/edit'),
        ];
    }
}
