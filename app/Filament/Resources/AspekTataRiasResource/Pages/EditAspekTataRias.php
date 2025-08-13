<?php

namespace App\Filament\Resources\AspekTataRiasResource\Pages;

use App\Filament\Resources\AspekTataRiasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAspekTataRias extends EditRecord
{
    protected static string $resource = AspekTataRiasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
