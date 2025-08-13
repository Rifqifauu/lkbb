<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AspekPenguranganNilaiResource\Pages;
use App\Filament\Resources\AspekPenguranganNilaiResource\RelationManagers;
use App\Models\AspekPenguranganNilai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;


class AspekPenguranganNilaiResource extends Resource
{
    protected static ?string $model = AspekPenguranganNilai::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Aspek Penilaian';

    protected static ?string $navigationLabel = 'Aspek Pengurangan Nilai';
    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Grid::make(4)->schema([
                // Baris 1
                TextInput::make('nama_penilaian')
                    ->label('Nama Aspek')
                    ->required()
                    ->columnSpan(2),
                TextInput::make('pengurangan')
                    ->label('Pengurangan Nilai')
                    ->required()
                    ->numeric()
                    ->columnSpan(2),
            ]),
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_penilaian')
                    ->label('Nama Aspek')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('pengurangan')
                    ->label('Pengurangan Nilai')
                    ->sortable()
                    ->numeric(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAspekPenguranganNilais::route('/'),
            'create' => Pages\CreateAspekPenguranganNilai::route('/create'),
            'edit' => Pages\EditAspekPenguranganNilai::route('/{record}/edit'),
        ];
    }
}
