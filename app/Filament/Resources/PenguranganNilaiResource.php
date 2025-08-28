<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenguranganNilaiResource\Pages;
use App\Filament\Resources\PenguranganNilaiResource\RelationManagers;
use App\Models\PenguranganNilai;
use App\Models\AspekPenguranganNilai;
use App\Models\Peserta;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenguranganNilaiResource extends Resource
{
    protected static ?string $model = PenguranganNilai::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_peserta')
                    ->label('Nama Peserta')
                    ->required()
                    ->options(function () {
                        return Peserta::pluck('nama', 'id')->toArray();
                    }),
                Select::make('id_aspek')
                    ->label('Aspek Pengurangan Nilai')
                    ->required()
                    ->options(function () {
                        return AspekPenguranganNilai::pluck('nama_penilaian', 'id')->toArray();
                    }),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('peserta.nama')
                    ->label('Peserta')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('aspek.nama_penilaian')
                    ->label('Aspek Pengurangan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('aspek.pengurangan')
                    ->label('Nilai Pengurangan')
                    ->alignCenter()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
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
        return [
            //
        ];
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
