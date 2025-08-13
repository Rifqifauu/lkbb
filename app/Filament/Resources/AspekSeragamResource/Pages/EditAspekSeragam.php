<?php

namespace App\Filament\Resources\AspekSeragamResource\Pages;

use App\Filament\Resources\AspekSeragamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAspekSeragam extends EditRecord
{
    protected static string $resource = AspekSeragamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
