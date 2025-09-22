<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenilaianVariasiFormasiResource\Pages;
use App\Models\AspekVariasiFormasi;
use App\Models\PenilaianVariasiFormasi;
use App\Models\Peserta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PenilaianVariasiFormasiResource extends Resource
{
    protected static ?string $model = PenilaianVariasiFormasi::class;

    protected static ?string $navigationIcon   = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup  = 'Penilaian';
    protected static ?int    $navigationSort   = 2;
    protected static ?string $navigationLabel  = 'Penilaian VariasiFormasi';
    protected static ?string $modelLabel       = 'Penilaian VariasiFormasi';
    protected static ?string $pluralModelLabel = 'Penilaian VariasiFormasi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // CREATE ONLY - Pilih Tingkat
            Select::make('tingkat_picker')
                ->label('Pilih Tingkat')
                ->options([
                    'sd'   => 'SD',
                    'sltp' => 'SLTP',
                    'slta' => 'SLTA',
                ])
                ->live()
                ->required(fn (string $operation) => $operation === 'create')
                ->dehydrated(false)
                ->hiddenOn('edit'),

            // CREATE ONLY - Pilih Peserta
            Select::make('id_peserta')
                ->label('Pilih Peserta (No. Urut — Nama)')
                ->options(function (Get $get) {
                    $tingkat = $get('tingkat_picker');

                    return Peserta::query()
                        ->when($tingkat, fn ($q) => $q->where('tingkat', $tingkat))
                        ->whereDoesntHave('penilaianVariasiFormasi', fn ($q) => $q->where('id_user', auth()->id()))
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

            // Penilaian Per Aspek
            Repeater::make('penilaian_items')
                ->label('Penilaian Per Aspek')
                ->schema([
                    Hidden::make('id_aspek'),

                    Forms\Components\Section::make(function (callable $get) {
                        return AspekVariasiFormasi::find($get('id_aspek'))?->nama_penilaian ?? 'Aspek Penilaian';
                    })->schema([
                        Radio::make('nilai')
                            ->label('Pilih Nilai')
                            ->nullable()
                            ->hint('Kosongkan jika peserta tidak menampilkan gerakan')
                            ->options(function (callable $get) {
                                $id = $get('id_aspek');
                                if (!$id) return [];

                                $a = AspekVariasiFormasi::find($id);
                                if (!$a) return [];

                                return [
                                    (int) $a->kurang_1 => "Kurang 1 ({$a->kurang_1} poin)",
                                    (int) $a->kurang_2 => "Kurang 2 ({$a->kurang_2} poin)",
                                    (int) $a->cukup_1  => "Cukup 1 ({$a->cukup_1} poin)",
                                    (int) $a->cukup_2  => "Cukup 2 ({$a->cukup_2} poin)",
                                    (int) $a->baik_1   => "Baik 1 ({$a->baik_1} poin)",
                                    (int) $a->baik_2   => "Baik 2 ({$a->baik_2} poin)",
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
                ->default(function () {
                    return AspekVariasiFormasi::orderBy('id')
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
                ->label('No.')
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
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('penilai.name')
                ->label('Penilai')
                ->searchable()
                ->sortable(),
        ];

        // Kolom dinamis per-aspek
        foreach (AspekVariasiFormasi::orderBy('id')->get() as $aspek) {
            $columns[] = Tables\Columns\TextColumn::make('aspek_' . $aspek->id)
                ->label($aspek->nama_penilaian)
                ->alignCenter()
                ->getStateUsing(function ($record) use ($aspek) {
                    $row = PenilaianVariasiFormasi::where('id_peserta', $record->id_peserta)
                        ->where('id_user',  $record->id_user)
                        ->where('id_aspek', $aspek->id)
                        ->first();

                    return $row?->nilai ?? '-';
                });
        }

        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $user = auth()->user();

                if (!$user->hasAnyRole(['super_admin', 'admin panitia'])) {
                    $query->where('id_user', $user->id);
                }

                $query->with(['peserta', 'penilai'])
                    ->whereIn('id', function ($sub) {
                        $sub->selectRaw('MIN(id)')
                            ->from('penilaian_variasi_formasi')
                            ->groupBy('id_peserta', 'id_user');
                    });
            })
            ->columns($columns)
            ->defaultSort('id_peserta')
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
                        PenilaianVariasiFormasi::where('id_peserta', $record->id_peserta)
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
                            PenilaianVariasiFormasi::where('id_peserta', $record->id_peserta)
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

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPenilaianVariasiFormasis::route('/'),
            'create' => Pages\CreatePenilaianVariasiFormasi::route('/create'),
            'edit'   => Pages\EditPenilaianVariasiFormasi::route('/{record}/edit'),
        ];
    }
}
