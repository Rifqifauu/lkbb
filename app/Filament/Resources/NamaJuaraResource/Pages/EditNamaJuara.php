<?php

namespace App\Filament\Resources\NamaJuaraResource\Pages;

use App\Filament\Resources\NamaJuaraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNamaJuara extends EditRecord
{
    protected static string $resource = NamaJuaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
