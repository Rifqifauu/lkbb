<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RekapNilaiResource\Pages;
use App\Models\PenguranganNilai;
use App\Models\RekapNilai;
use App\Models\Peserta;
use App\Models\PenilaianPBB;
use App\Models\PenilaianDanton;
use App\Models\PenilaianSeragam;
use App\Models\PenilaianTataRias;
use App\Models\PenilaianVariasiFormasi;
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

    protected static ?string $navigationIcon  = 'heroicon-o-table-cells';
    protected static ?string $navigationLabel = 'Rekap Nilai';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Select::make('id_peserta')
                ->options(fn() => Peserta::pluck('nama', 'id'))
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
        return $table
            ->columns([
                TextColumn::make('peserta.nama')
                    ->label('Peserta')
                    ->sortable(),

                TextColumn::make('waktu')
                    ->label('Waktu')
                    ->sortable()
                    ->suffix(' Menit'),

                // ===== NILAI PBB =====
                TextColumn::make('nilai_pbb')
                    ->label('Nilai PBB')
                    ->getStateUsing(
                        fn($record) =>
                        (int) PenilaianPBB::where('id_peserta', $record->id_peserta)->sum('nilai')
                    )
                    ->sortable(),

                // ===== NILAI DANTON =====
                TextColumn::make('nilai_danton')
                    ->label('Nilai Danton')
                    ->getStateUsing(
                        fn($record) =>
                        (int) PenilaianDanton::where('id_peserta', $record->id_peserta)->sum('nilai')
                    )
                    ->sortable(),

                // ===== NILAI KOSTUM =====
                TextColumn::make('nilai_kostum')
                    ->label('Nilai Kostum')
                    ->getStateUsing(
                        fn($record) =>
                        (int) PenilaianSeragam::where('id_peserta', $record->id_peserta)->sum('nilai')
                    )
                    ->sortable(),

                // ===== NILAI TATA RIAS =====
                TextColumn::make('nilai_tata_rias')
                    ->label('Nilai Tata Rias')
                    ->getStateUsing(
                        fn($record) =>
                        (int) PenilaianTataRias::where('id_peserta', $record->id_peserta)->sum('nilai')
                    )
                    ->sortable(),

                // ===== NILAI VARIASI FORMASI =====
                TextColumn::make('nilai_variasi_formasi')
                    ->label('Nilai Variasi Formasi')
                    ->getStateUsing(
                        fn($record) =>
                        (int) PenilaianVariasiFormasi::where('id_peserta', $record->id_peserta)->sum('nilai')
                    )
                    ->sortable(),

                // ===== PENGURANGAN =====
                TextColumn::make('nilai_pengurangan')
                    ->label('Pengurangan')
                    ->getStateUsing(function ($record) {
                        return (int) PenguranganNilai::where('id_peserta', $record->id_peserta)
                            ->get()
                            ->sum(fn($p) => $p->nilai_pengurangan);   // ✅ pakai accessor
                    })
                    ->sortable(),

                // ===== TOTAL UTAMA =====
                TextColumn::make('total_utama')
                    ->label('Total Utama')
                    ->getStateUsing(function ($record) {
                        $pbb      = (int) PenilaianPBB::where('id_peserta', $record->id_peserta)->sum('nilai');
                        $danton   = (int) PenilaianDanton::where('id_peserta', $record->id_peserta)->sum('nilai');
                        $kostum   = (int) PenilaianSeragam::where('id_peserta', $record->id_peserta)->sum('nilai');
                        $tataRias = (int) PenilaianTataRias::where('id_peserta', $record->id_peserta)->sum('nilai');
                        $variasi  = (int) PenilaianVariasiFormasi::where('id_peserta', $record->id_peserta)->sum('nilai');

                        return $pbb + $danton + $kostum + $tataRias + $variasi;
                    })
                    ->sortable(),

                // ===== TOTAL UMUM =====
                TextColumn::make('total_umum')
                    ->label('Total Umum')
                    ->getStateUsing(function ($record) {
                        $pbb      = (int) PenilaianPBB::where('id_peserta', $record->id_peserta)->sum('nilai');
                        $danton   = (int) PenilaianDanton::where('id_peserta', $record->id_peserta)->sum('nilai');
                        $kostum   = (int) PenilaianSeragam::where('id_peserta', $record->id_peserta)->sum('nilai');
                        $tataRias = (int) PenilaianTataRias::where('id_peserta', $record->id_peserta)->sum('nilai');
                        $variasi  = (int) PenilaianVariasiFormasi::where('id_peserta', $record->id_peserta)->sum('nilai');

                        $pengurang = (int) PenguranganNilai::where('id_peserta', $record->id_peserta)
                            ->get()
                            ->sum(fn($p) => $p->nilai_pengurangan);   // ✅ pakai accessor

                        return $pbb + $danton + $kostum + $tataRias + $variasi - $pengurang;
                    })
                    ->sortable(),


                // ===== TOTAL UMUM =====
                TextColumn::make('total_umum')
                    ->label('Total Umum')
                    ->getStateUsing(function ($record) {
                        $pbb      = (int) PenilaianPBB::where('id_peserta', $record->id_peserta)->sum('nilai');
                        $danton   = (int) PenilaianDanton::where('id_peserta', $record->id_peserta)->sum('nilai');
                        $kostum   = (int) PenilaianSeragam::where('id_peserta', $record->id_peserta)->sum('nilai');
                        $tataRias = (int) PenilaianTataRias::where('id_peserta', $record->id_peserta)->sum('nilai');
                        $variasi  = (int) PenilaianVariasiFormasi::where('id_peserta', $record->id_peserta)->sum('nilai');
                        $pengurang = (int) PenguranganNilai::where('id_peserta', $record->id_peserta)
                            ->join('aspek_pengurangan_nilai', 'pengurangan_nilai.id_aspek', '=', 'aspek_pengurangan_nilai.id')
                            ->sum('aspek_pengurangan_nilai.pengurangan');

                        return $pbb + $danton + $kostum + $tataRias + $variasi - $pengurang;
                    })
                    ->sortable(),
            ])
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
            'index'  => Pages\ListRekapNilais::route('/'),
            'create' => Pages\CreateRekapNilai::route('/create'),
            'edit'   => Pages\EditRekapNilai::route('/{record}/edit'),
        ];
    }
}
