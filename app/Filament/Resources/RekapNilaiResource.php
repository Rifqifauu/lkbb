<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RekapNilaiResource\Pages;
use App\Models\RekapNilai;
use App\Models\Peserta;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;

class RekapNilaiResource extends Resource
{
    protected static ?string $model = RekapNilai::class;

    protected static ?string $navigationIcon = 'heroicon-o-table-cells';
    protected static ?string $navigationLabel = 'Rekap Nilai';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('id_peserta')
                    ->options(fn () => Peserta::pluck('nama', 'id'))
                    ->required()
                    ->label('Peserta'),

                TextInput::make('waktu')
                    ->required()
                    ->suffix(' Menit')
                    ->label('Waktu'),
            ]);
    }

    public static function table(Table $table): Table
    {
        // Kolom default
        $columns = [
            TextColumn::make('peserta.nama')
                ->label('Peserta')
                ->sortable(),

            TextColumn::make('waktu')
                ->label('Waktu')
                ->sortable()
                ->suffix(' Menit'),
        ];

        // Ambil semua juri dari tabel users
        $juris = User::all();

        foreach ($juris as $juri) {
            // Nilai PBB per juri
            $columns[] = TextColumn::make('pbb_' . $juri->id)
                ->label('Nilai PBB (' . $juri->name . ')')
                ->getStateUsing(fn ($record) =>
                    optional($record->penilaianPbb->firstWhere('id_user', $juri->id))->nilai
                );

            // Nilai Danton per juri
            $columns[] = TextColumn::make('danton_' . $juri->id)
                ->label('Nilai Danton (' . $juri->name . ')')
                ->getStateUsing(fn ($record) =>
                    optional($record->penilaianDanton->firstWhere('id_user', $juri->id))->nilai
                );

            // Nilai Kostum per juri
            $columns[] = TextColumn::make('kostum_' . $juri->id)
                ->label('Nilai Kostum (' . $juri->name . ')')
                ->getStateUsing(fn ($record) =>
                    optional($record->penilaianSeragam->firstWhere('id_user', $juri->id))->nilai
                );

            // Nilai Tata Rias per juri
            $columns[] = TextColumn::make('tata_rias_' . $juri->id)
                ->label('Nilai Tata Rias (' . $juri->name . ')')
                ->getStateUsing(fn ($record) =>
                    optional($record->penilaianTataRias->firstWhere('id_user', $juri->id))->nilai
                );

            // Nilai Variasi Formasi per juri
            $columns[] = TextColumn::make('variasi_formasi_' . $juri->id)
                ->label('Nilai Variasi Formasi (' . $juri->name . ')')
                ->getStateUsing(fn ($record) =>
                    optional($record->penilaianVariasiFormasi->firstWhere('id_user', $juri->id))->nilai
                );
        }

        // Kolom rata-rata + total
        $columns = array_merge($columns, [
            TextColumn::make('nilai_pbb')->label('Rata-rata PBB')->sortable(),
            TextColumn::make('nilai_danton')->label('Rata-rata Danton')->sortable(),
            TextColumn::make('nilai_kostum')->label('Rata-rata Kostum')->sortable(),
            TextColumn::make('nilai_tata_rias')->label('Rata-rata Tata Rias')->sortable(),
            TextColumn::make('nilai_variasi_formasi')->label('Rata-rata Variasi Formasi')->sortable(),
            TextColumn::make('nilai_pengurangan')->label('Pengurangan')->sortable(),
            TextColumn::make('total_utama')->label('Total Utama')->sortable(),
            TextColumn::make('total_umum')->label('Total Umum')->sortable(),
        ]);

        return $table
            ->columns($columns)
            ->filters([])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPluralLabel(): string
    {
        return 'Rekap Nilai';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRekapNilais::route('/'),
            'create' => Pages\CreateRekapNilai::route('/create'),
            'edit' => Pages\EditRekapNilai::route('/{record}/edit'),
        ];
    }
}
