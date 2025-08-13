<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesertaResource\Pages;
use App\Models\Peserta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Validation\Rule;

class PesertaResource extends Resource
{
    protected static ?string $model = Peserta::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('no_tampil')
                    ->label('Nomor Tampil')
                    ->required()
                    ->numeric()
                    ->rule(function (callable $get, ?Peserta $record) {
                        return function (string $attribute, $value, \Closure $fail) use ($get, $record) {
                            if (!$value || !$get('tingkat')) {
                                return;
                            }

                            $exists = Peserta::where('no_tampil', $value)
                                ->where('tingkat', $get('tingkat'))
                                ->when($record, fn($query) => $query->where('id', '!=', $record->id))
                                ->exists();

                            if ($exists) {
                                $fail('Nomor tampil ini sudah digunakan di tingkat ' . strtoupper($get('tingkat')) . '.');
                            }
                        };
                    })
                    ->reactive(),

                Select::make('tingkat')
                    ->options([
                        'sltp' => 'SLTP',
                        'slta' => 'SLTA',
                    ])
                    ->required()
                    ->reactive(), // Make it reactive so changes trigger validation
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('no_tampil')
                    ->label('No. Tampil')
                    ->sortable(),

                TextColumn::make('tingkat')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'sltp' => 'danger',
                        'slta' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => strtoupper($state)),
            ])
            ->filters([
                SelectFilter::make('tingkat')
                    ->options([
                        'sltp' => 'SLTP',
                        'slta' => 'SLTA',
                    ])
                    ->multiple(),
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
            ->defaultSort('no_tampil', 'asc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesertas::route('/'),
            'create' => Pages\CreatePeserta::route('/create'),
            'edit' => Pages\EditPeserta::route('/{record}/edit'),
        ];
    }
}
