<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AspekPenguranganNilaiResource\Pages;
use App\Models\AspekPenguranganNilai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;

class AspekPenguranganNilaiResource extends Resource
{
    protected static ?string $model = AspekPenguranganNilai::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Aspek Penilaian';
    protected static ?string $navigationLabel = 'Aspek Pengurangan Nilai';
    //  protected static ?int    $navigationSort   = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(4)->schema([
                    TextInput::make('nama_penilaian')
                        ->label('Nama Aspek')
                        ->required()
                        ->columnSpan(2),
TextInput::make('pengurangan')
    ->label('Pengurangan Nilai')
    ->numeric()
    ->nullable()
    ->requiredWithoutAll(['per_durasi', 'per_anggota'])
    ->columnSpan(2),

TextInput::make('per_durasi')
    ->label('Per Durasi (per menit)')
    ->numeric()
    ->nullable()
    ->requiredWithoutAll(['pengurangan', 'per_anggota'])
    ->columnSpan(2),

TextInput::make('per_anggota')
    ->label('Per Anggota')
    ->numeric()
    ->nullable()
    ->requiredWithoutAll(['pengurangan', 'per_durasi'])
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
                    ->label('Pengurangan Langsung')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('per_durasi')
                    ->label('Per Durasi (menit)')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('per_anggota')
                    ->label('Per Anggota')
                    ->numeric()
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
            'index' => Pages\ListAspekPenguranganNilais::route('/'),
            'create' => Pages\CreateAspekPenguranganNilai::route('/create'),
            'edit' => Pages\EditAspekPenguranganNilai::route('/{record}/edit'),
        ];
    }
}
