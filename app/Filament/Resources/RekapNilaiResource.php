<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RekapNilaiResource\Pages;
use App\Models\RekapNilai;
use App\Models\Peserta;  // Ensure Peserta model is included
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
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

    /**
     * Define the form schema for RekapNilai resource.
     */
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('id_peserta')
                    ->options(function () {
                        return Peserta::pluck('nama', 'id'); // Ensure Peserta model is being used correctly
                    })
                    ->required()
                    ->label('Peserta'),

                TextInput::make('waktu')
                    ->required()
                    ->suffix(' Menit')
                    ->label('Waktu'),
            ]);
    }

    /**
     * Define the table schema for displaying RekapNilai records.
     */
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
                    TextColumn::make('nilai_pbb')
                    ->label('Nilai PBB')
                    ->sortable(),
                TextColumn::make('nilai_danton')
                    ->label('Nilai Danton')
                    ->sortable(),
                TextColumn::make('nilai_kostum')
                    ->label('Nilai Kostum')
                    ->sortable(),
                TextColumn::make('nilai_tata_rias')
                    ->label('Nilai Tata Rias')
                    ->sortable(),
                TextColumn::make('nilai_variasi_formasi')
                    ->label('Nilai Variasi Formasi')
                    ->sortable(),
                TextColumn::make('nilai_pengurangan')
                    ->label('Nilai Pengurangan')
                    ->sortable(),
                TextColumn::make('total_utama')
                    ->label('Total Utama')
                    ->sortable(),
                TextColumn::make('total_umum')
                    ->label('Total Umum')
                    ->sortable(),
            ])
            ->filters([
                // Add any filters if needed
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    /**
     * Define plural label for the resource.
     */
    public static function getPluralLabel(): string
    {
        return 'Rekap Nilai';
    }

    /**
     * Define pages for this resource.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRekapNilais::route('/'),
            'create' => Pages\CreateRekapNilai::route('/create'),
            'edit' => Pages\EditRekapNilai::route('/{record}/edit'),
        ];
    }
}
