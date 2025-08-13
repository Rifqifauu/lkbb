<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenilaianPBBResource\Pages;
use App\Filament\Resources\PenilaianPBBResource\RelationManagers;
use App\Models\PenilaianPBB;
use App\Models\AspekPBB;
use App\Models\Peserta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Collection;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;

class PenilaianPBBResource extends Resource
{
    protected static ?string $model = PenilaianPBB::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'Penilaian';
    protected static ?string $navigationLabel = 'Penilaian PBB';
    protected static ?string $modelLabel = 'Penilaian PBB';
    protected static ?string $pluralModelLabel = 'Penilaian PBB';

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

                    TextInput::make('nama_aspek')
                        ->label('Aspek Penilaian')
                        ->disabled()
                        ->columnSpan(2),

                    Select::make('nilai')
                        ->label('Nilai')
                        ->options(function (callable $get) {
                            $aspekId = $get('id_aspek');
                            if (!$aspekId) {
                                return [];
                            }

                            $aspek = AspekPBB::find($aspekId);
                            if (!$aspek) {
                                return [];
                            }

                            $options = [];

                            // Add kurang options
                            if ($aspek->kurang_1) {
                                $options['kurang_1'] = "Kurang 1 ({$aspek->kurang_1} poin)";
                            }
                            if ($aspek->kurang_2) {
                                $options['kurang_2'] = "Kurang 2 ({$aspek->kurang_2} poin)";
                            }

                            // Add cukup options
                            if ($aspek->cukup_1) {
                                $options['cukup_1'] = "Cukup 1 ({$aspek->cukup_1} poin)";
                            }
                            if ($aspek->cukup_2) {
                                $options['cukup_2'] = "Cukup 2 ({$aspek->cukup_2} poin)";
                            }

                            // Add baik options
                            if ($aspek->baik_1) {
                                $options['baik_1'] = "Baik 1 ({$aspek->baik_1} poin)";
                            }
                            if ($aspek->baik_2) {
                                $options['baik_2'] = "Baik 2 ({$aspek->baik_2} poin)";
                            }

                            return $options;
                        })
                        ->required()
                        ->columnSpan(2),
                ])
                ->columns(4)
                ->disableItemCreation()
                ->disableItemDeletion()
                ->disableItemMovement()
                ->collapsible()
                ->default(function () {
                    return AspekPBB::all()->map(fn ($aspek) => [
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
    // Define the basic columns
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

    // Add dynamic columns for each aspect
    foreach (AspekPBB::all() as $aspek) {
        $columns[] = Tables\Columns\TextColumn::make("aspek_{$aspek->id}")
            ->label($aspek->nama_penilaian)
            ->getStateUsing(function ($record) use ($aspek) {
                // Find penilaian for this peserta, penilai, and specific aspek
                $penilaian = PenilaianPBB::where('id_peserta', $record->id_peserta)
                    ->where('id_user', $record->id_user)
                    ->where('id_aspek', $aspek->id)
                    ->first();

                if ($penilaian && $penilaian->nilai) {
                    // Convert nilai to actual score using the current $aspek object
                    return match($penilaian->nilai) {
                        'kurang_1' => $aspek->kurang_1 ?? 0,
                        'kurang_2' => $aspek->kurang_2 ?? 0,
                        'cukup_1' => $aspek->cukup_1 ?? 0,
                        'cukup_2' => $aspek->cukup_2 ?? 0,
                        'baik_1' => $aspek->baik_1 ?? 0,
                        'baik_2' => $aspek->baik_2 ?? 0,
                        default => $penilaian->nilai, // Return raw nilai for debugging
                    };
                }

                return '-';
            })
            ->alignCenter();
    }

    return $table
        ->query(
            // Simple approach: get all records and handle uniqueness in the display
            PenilaianPBB::with(['peserta', 'penilai', 'aspek'])
                ->orderBy('id_peserta')
                ->orderBy('id_user')
        )
        ->modifyQueryUsing(function (Builder $query) {
            // Get unique combinations using a subquery
            return $query->whereIn('id', function ($subQuery) {
                $subQuery->selectRaw('MIN(id)')
                    ->from('penilaian_pbb')
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
        return [
            // Tambahkan relation managers jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenilaianPBBs::route('/'),
            'create' => Pages\CreatePenilaianPBB::route('/create'),
            'edit' => Pages\EditPenilaianPBB::route('/{record}/edit'),
        ];
    }
}
