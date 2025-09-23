<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AspekPBBResource\Pages;
use App\Models\AspekPBB;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;

class AspekPBBResource extends Resource
{
    protected static ?string $model = AspekPBB::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Aspek Penilaian';
    protected static ?string $navigationLabel = 'Formulasi PBB';
    //  protected static ?int    $navigationSort   = 1;

    public static function getModelLabel(): string
    {
        return 'Formulasi PBB:'; // judul singular
    }

    public static function getPluralModelLabel(): string
    {
        return 'Formulasi PBB:'; // judul plural (List)
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(12)->schema([
                    // Nama Aspek
                    TextInput::make('nama_penilaian')
                        ->label('Nama Aspek')
                        ->required()
                        ->columnSpan(12),

                    // Pilih Tingkat (SD / SLTP / SLTA)
                    Select::make('tingkat')
                        ->label('Tingkat')
                        ->options([
                            'sd'        => 'SD',
                            'sltp_slta' => 'SLTP & SLTA',
                        ])
                        ->required()
                        ->columnSpan(12),

                    // Nilai Kurang
                    Grid::make(3)->schema([
                        TextInput::make('kurang_1')->label('Kurang 1')->required()->numeric(),
                        TextInput::make('kurang_2')->label('Kurang 2')->required()->numeric(),
                        TextInput::make('kurang_3')->label('Kurang 3')->required()->numeric(),
                    ])->columnSpan(12),

                    // Nilai Cukup
                    Grid::make(3)->schema([
                        TextInput::make('cukup_1')->label('Cukup 1')->required()->numeric(),
                        TextInput::make('cukup_2')->label('Cukup 2')->required()->numeric(),
                        TextInput::make('cukup_3')->label('Cukup 3')->required()->numeric(),
                    ])->columnSpan(12),

                    // Nilai Baik
                    Grid::make(3)->schema([
                        TextInput::make('baik_1')->label('Baik 1')->required()->numeric(),
                        TextInput::make('baik_2')->label('Baik 2')->required()->numeric(),
                        TextInput::make('baik_3')->label('Baik 3')->required()->numeric(),
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

                TextColumn::make('tingkat')
                    ->label('Tingkat')
                    ->badge()
                    ->sortable()
                    ->color(fn($state) => match ($state) {
                        'sd'        => 'warning',
                        'sltp_slta' => 'success',
                        default     => 'gray',
                    })
                    ->formatStateUsing(fn($state) => strtoupper(str_replace('_', ' ', $state))),


                TextColumn::make('kurang_1')->label('Kurang 1')->sortable(),
                TextColumn::make('kurang_2')->label('Kurang 2')->sortable(),
                TextColumn::make('kurang_3')->label('Kurang 3')->sortable(),

                TextColumn::make('cukup_1')->label('Cukup 1')->sortable(),
                TextColumn::make('cukup_2')->label('Cukup 2')->sortable(),
                TextColumn::make('cukup_3')->label('Cukup 3')->sortable(),

                TextColumn::make('baik_1')->label('Baik 1')->sortable(),
                TextColumn::make('baik_2')->label('Baik 2')->sortable(),
                TextColumn::make('baik_3')->label('Baik 3')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tingkat')
                    ->label('Filter Tingkat')
                    ->label('Filter Tingkat')
                    ->options([
                        'sd'        => 'SD',
                        'sltp_slta' => 'SLTP & SLTA',
                    ]),
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
            'index'  => Pages\ListAspekPBBs::route('/'),
            'create' => Pages\CreateAspekPBB::route('/create'),
            'edit'   => Pages\EditAspekPBB::route('/{record}/edit'),
        ];
    }
}
