<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AspekVariasiFormasiResource\Pages;
use App\Models\AspekVariasiFormasi;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;

class AspekVariasiFormasiResource extends Resource
{
    protected static ?string $model = AspekVariasiFormasi::class;
    protected static ?string $navigationGroup = 'Aspek Penilaian';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

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

                    TextInput::make('cukup_1')
                        ->label('Cukup 1')
                        ->required()
                        ->numeric(),
                ])->columnSpan(12),

                // Baris 3
                Grid::make(3)->schema([
                    TextInput::make('cukup_2')
                        ->label('Cukup 2')
                        ->required()
                        ->numeric(),
                    TextInput::make('baik_1')
                        ->label('Baik 1')
                        ->required()
                        ->numeric(),
                    TextInput::make('baik_2')
                        ->label('Baik 2')
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

                TextColumn::make('cukup_1')
                    ->label('Cukup 1')
                    ->sortable(),

                TextColumn::make('cukup_2')
                    ->label('Cukup 2')
                    ->sortable(),

                TextColumn::make('baik_1')
                    ->label('Baik 1')
                    ->sortable(),

                TextColumn::make('baik_2')
                    ->label('Baik 2')
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAspekVariasiFormasis::route('/'),

        ];
    }
}
