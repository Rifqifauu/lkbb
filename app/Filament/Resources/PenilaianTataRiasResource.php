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
use Illuminate\Database\Eloquent\Collection;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Radio;

class PenilaianTataRiasResource extends Resource
{
    protected static ?string $model = PenilaianTataRias::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'Penilaian';
    protected static ?string $navigationLabel = 'Penilaian TataRias';
    protected static ?string $modelLabel = 'Penilaian TataRias';
    protected static ?string $pluralModelLabel = 'Penilaian TataRias';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('id_peserta')
                ->label('Pilih Peserta')
                ->options(Peserta::pluck('nama', 'id')->toArray())
                ->searchable()
                ->required()
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

                    $aspek = AspekTataRias::find($aspekId);
                    if (!$aspek) return [];

                    return [
                        'kurang_1' => "Kurang 1 ({$aspek->kurang_1} poin)",
                        'kurang_2' => "Kurang 2 ({$aspek->kurang_2} poin)",
                        'kurang_3' => "Kurang 3 ({$aspek->kurang_3} poin)",
                        'cukup_1'  => "Cukup 1 ({$aspek->cukup_1} poin)",
                        'cukup_2'  => "Cukup 2 ({$aspek->cukup_2} poin)",
                        'cukup_3'  => "Cukup 3 ({$aspek->cukup_3} poin)",
                        'baik_1'   => "Baik 1 ({$aspek->baik_1} poin)",
                        'baik_2'   => "Baik 2 ({$aspek->baik_2} poin)",
                        'baik_3'   => "Baik 3 ({$aspek->baik_3} poin)",
                    ];
                })
                ->required()
                ->columns([
                    'default' => 1, // HP → 2 kolom
                    'sm' => 3,      // Tablet → 3 kolom
                    'lg' => 3,      // Desktop → 3 kolom
                ])
                ->inline(false), // biar tampil rapih per baris
        ]),
    ])
    ->disableItemCreation()
    ->disableItemDeletion()
    ->disableItemMovement()
    ->collapsible()
    ->default(function () {
        return AspekTataRias::all()->map(fn ($aspek) => [
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
            Tables\Columns\TextColumn::make('peserta.nama')
                ->label('Peserta')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('penilai.name')
                ->label('Penilai')
                ->searchable()
                ->sortable(),
        ];

        // Tambahkan kolom dinamis sesuai aspek
        foreach (AspekTataRias::all() as $aspek) {
            $columns[] = Tables\Columns\TextColumn::make("aspek_{$aspek->id}")
                ->label($aspek->nama_penilaian)
                ->getStateUsing(function ($record) use ($aspek) {
                    $penilaian = PenilaianTataRias::where('id_peserta', $record->id_peserta)
                        ->where('id_user', $record->id_user)
                        ->where('id_aspek', $aspek->id)
                        ->first();

                    if ($penilaian && $penilaian->nilai) {
                        return match ($penilaian->nilai) {
                            'kurang_1' => $aspek->kurang_1 ?? 0,
                            'kurang_2' => $aspek->kurang_2 ?? 0,
                            'kurang_3' => $aspek->kurang_3 ?? 0,
                            'cukup_1'  => $aspek->cukup_1 ?? 0,
                            'cukup_2'  => $aspek->cukup_2 ?? 0,
                            'cukup_3'  => $aspek->cukup_3 ?? 0,
                            'baik_1'   => $aspek->baik_1 ?? 0,
                            'baik_2'   => $aspek->baik_2 ?? 0,
                            'baik_3'   => $aspek->baik_3 ?? 0,
                            default    => $penilaian->nilai,
                        };
                    }

                    return '-';
                })
                ->alignCenter();
        }

        return $table
            ->query(
                PenilaianTataRias::with(['peserta', 'penilai', 'aspek'])
                    ->orderBy('id_peserta')
                    ->orderBy('id_user')
            )
            ->modifyQueryUsing(function (Builder $query) {
                return $query->whereIn('id', function ($subQuery) {
                    $subQuery->selectRaw('MIN(id)')
                        ->from('penilaian_tata_rias')
                        ->groupBy('id_peserta', 'id_user');
                });
            })
            ->columns($columns)
            ->filters([
                Tables\Filters\SelectFilter::make('id_peserta')
                    ->label('Filter Peserta')
                    ->options(Peserta::pluck('nama', 'id')->toArray()),
            ])
            ->actions([
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenilaianTataRias::route('/'),
            'create' => Pages\CreatePenilaianTataRias::route('/create'),
            'edit' => Pages\EditPenilaianTataRias::route('/{record}/edit'),
        ];
    }
}
