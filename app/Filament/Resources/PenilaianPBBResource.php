<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenilaianPBBResource\Pages;
use App\Models\AspekPBB;
use App\Models\PenilaianPBB;
use App\Models\Peserta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;                // <- penting!
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class PenilaianPBBResource extends Resource
{
    protected static ?string $model = PenilaianPBB::class;

    protected static ?string $navigationIcon   = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup  = 'Penilaian';
    protected static ?string $navigationLabel  = 'Penilaian PBB';
    protected static ?string $modelLabel       = 'Penilaian PBB';
    protected static ?string $pluralModelLabel = 'Penilaian PBB';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('id_peserta')
                ->label('Pilih Peserta')
                ->options(Peserta::orderBy('nama')->pluck('nama', 'id'))
                ->searchable()
                ->required()
                ->columnSpanFull(),

            Repeater::make('penilaian_items')
                ->label('Penilaian Per Aspek')
                ->schema([
                    Hidden::make('id_aspek'),

                    Section::make(fn (callable $get) =>
                        \App\Models\AspekPBB::find($get('id_aspek'))?->nama_penilaian ?? 'Aspek Penilaian'
                    )->schema([
                        Radio::make('nilai')
                            ->label('Pilih Nilai')
                            ->nullable()
                            ->hint('Kosongkan jika peserta tidak menampilkan gerakan')
                            ->options(function (callable $get) {
                                $aspekId = $get('id_aspek');
                                if (!$aspekId) return [];

                                $a = AspekPBB::find($aspekId);
                                if (!$a) return [];

                                // pakai ANGKA sebagai key
                                return [
                                    (int)$a->kurang_1 => "Kurang 1 ({$a->kurang_1} poin)",
                                    (int)$a->kurang_2 => "Kurang 2 ({$a->kurang_2} poin)",
                                    (int)$a->kurang_3 => "Kurang 3 ({$a->kurang_3} poin)",
                                    (int)$a->cukup_1  => "Cukup 1 ({$a->cukup_1} poin)",
                                    (int)$a->cukup_2  => "Cukup 2 ({$a->cukup_2} poin)",
                                    (int)$a->cukup_3  => "Cukup 3 ({$a->cukup_3} poin)",
                                    (int)$a->baik_1   => "Baik 1 ({$a->baik_1} poin)",
                                    (int)$a->baik_2   => "Baik 2 ({$a->baik_2} poin)",
                                    (int)$a->baik_3   => "Baik 3 ({$a->baik_3} poin)",
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
                    return AspekPBB::all()->map(fn ($a) => [
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
            Tables\Columns\TextColumn::make('peserta.nama')
                ->label('Peserta')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('penilai.name')
                ->label('Penilai')
                ->sortable()
                ->searchable(),
        ];

        // kolom dinamis per Aspek
        foreach (AspekPBB::orderBy('id')->get() as $aspek) {
            $columns[] = Tables\Columns\TextColumn::make('aspek_'.$aspek->id)
                ->label($aspek->nama_penilaian)
                ->alignCenter()
                ->getStateUsing(function ($record) use ($aspek) {
                    $row = PenilaianPBB::where('id_peserta', $record->id_peserta)
                        ->where('id_user',    $record->id_user)
                        ->where('id_aspek',   $aspek->id)
                        ->first();

                    return $row?->nilai ?? '-';
                });
        }

        return $table
            // 1 baris per kombinasi (id_peserta, id_user)
            ->modifyQueryUsing(function (Builder $query) {
                $user = Auth::user();

                // filter data milik penilai selain admin
                if (! $user->hasAnyRole(['super_admin', 'admin panitia'])) {
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPenilaianPBBS::route('/'),
            'create' => Pages\CreatePenilaianPBB::route('/create'),
            'edit'   => Pages\EditPenilaianPBB::route('/{record}/edit'),
        ];
    }
}
