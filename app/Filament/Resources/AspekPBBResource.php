<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AspekPBBResource\Pages;
use App\Filament\Resources\AspekPBBResource\RelationManagers;
use App\Models\AspekPBB;
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


class AspekPBBResource extends Resource
{
    protected static ?string $model = AspekPBB::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Aspek Penilaian';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Grid::make(12)->schema([
                // Baris 1
                TextInput::make('nama_penilaian')
                    ->label('Nama Aspek')
                    ->required()
                    ->columnSpan(12),

                // Baris 2
                Grid::make(3)->schema([
                    TextInput::make('kurang_1')
                        ->label('Kurang 1')
                        ->required()
                        ->numeric(),

                    TextInput::make('kurang_2')
                        ->label('Kurang 2')
                        ->required()
                        ->numeric(),
                    TextInput::make('kurang_3')
                        ->label('Kurang 3')
                        ->required()
                        ->numeric(),
                ])->columnSpan(12),

                // Baris 3
                Grid::make(3)->schema([
                    TextInput::make('cukup_1')
                        ->label('Cukup 1')
                        ->required()
                        ->numeric(),
                    TextInput::make('cukup_2')
                        ->label('Cukup 2')
                        ->required()
                        ->numeric(),
                        TextInput::make('cukup_3')
                        ->label('Cukup 3')
                        ->required()
                        ->numeric(),
               
                ])->columnSpan(12),
                Grid::make(3)->schema([
                        TextInput::make('baik_1')
                        ->label('Baik 1')
                        ->required()
                        ->numeric(),
                    TextInput::make('baik_2')
                        ->label('Baik 2')
                        ->required()
                        ->numeric(),
                    TextInput::make('baik_3')
                        ->label('Baik 3')
                        ->required()
                        ->numeric(),
               
                ])->columnSpan(12),
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

                TextColumn::make('kurang_1')
                    ->label('Kurang 1')
                    ->sortable(),

                TextColumn::make('kurang_2')
                    ->label('Kurang 2')
                    ->sortable(),
                TextColumn::make('kurang_3')
                    ->label('Kurang 3')
                    ->sortable(),

                TextColumn::make('cukup_1')
                    ->label('Cukup 1')
                    ->sortable(),

                TextColumn::make('cukup_2')
                    ->label('Cukup 2')
                    ->sortable(),
                TextColumn::make('cukup_3')
                    ->label('Cukup 3')
                    ->sortable(),

                TextColumn::make('baik_1')
                    ->label('Baik 1')
                    ->sortable(),

                TextColumn::make('baik_2')
                    ->label('Baik 2')
                    ->sortable(),
                TextColumn::make('baik_3')
                    ->label('Baik 3')
                    ->sortable(),
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
            'index' => Pages\ListAspekPBBs::route('/'),
            'create' => Pages\CreateAspekPBB::route('/create'),
            'edit' => Pages\EditAspekPBB::route('/{record}/edit'),
        ];
    }
}
