<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenguranganNilaiResource\Pages;
use App\Models\PenguranganNilai;
use App\Models\AspekPenguranganNilai;
use App\Models\Peserta;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Forms\Form;

class PenguranganNilaiResource extends Resource
{
    protected static ?string $model = PenguranganNilai::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'Penilaian';
    protected static ?string $navigationLabel = 'Pengurangan Nilai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_peserta')
                    ->label('Nama Peserta')
                    ->required()
                    ->options(fn () => Peserta::pluck('nama', 'id')->toArray())
                    ->searchable(),

                Select::make('id_aspek')
                    ->label('Aspek Pengurangan Nilai')
                    ->required()
                    ->options(fn () => AspekPenguranganNilai::pluck('nama_penilaian', 'id')->toArray())
                    ->searchable(),

                TextInput::make('jml_anggota_penalti')
                    ->label('Jumlah Anggota Penalti')
                    ->numeric()
                    ->nullable(),

                TextInput::make('durasi_penalti')
                    ->label('Durasi Penalti (menit)')
                    ->numeric()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('peserta.nama')
                    ->label('Peserta')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('aspek.nama_penilaian')
                    ->label('Aspek Pengurangan')
                    ->searchable()
                    ->sortable(),

                // Menampilkan nilai pengurangan (langsung atau perhitungan)
                TextColumn::make('nilai_pengurangan')
                    ->label('Nilai Pengurangan')
                    ->alignCenter()
                    ->getStateUsing(function ($record) {
                        $aspek = $record->aspek;

                        // Kalau aspek punya pengurangan langsung
                        if (!is_null($aspek->pengurangan)) {
                            return $aspek->pengurangan;
                        }

                        // Hitung berdasarkan per durasi / per anggota
                        $total = 0;
                        if (!is_null($aspek->per_durasi) && $record->durasi_penalti) {
                            $total += $aspek->per_durasi * $record->durasi_penalti;
                        }
                        if (!is_null($aspek->per_anggota) && $record->jml_anggota_penalti) {
                            $total += $aspek->per_anggota * $record->jml_anggota_penalti;
                        }

                        return $total ?: '-';
                    }),

                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('id_peserta')
                    ->label('Filter Peserta')
                    ->options(Peserta::pluck('nama', 'id')->toArray()),

                Tables\Filters\SelectFilter::make('id_aspek')
                    ->label('Filter Aspek')
                    ->options(AspekPenguranganNilai::pluck('nama_penilaian', 'id')->toArray()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenguranganNilais::route('/'),
            'create' => Pages\CreatePenguranganNilai::route('/create'),
            'edit' => Pages\EditPenguranganNilai::route('/{record}/edit'),
        ];
    }
}
