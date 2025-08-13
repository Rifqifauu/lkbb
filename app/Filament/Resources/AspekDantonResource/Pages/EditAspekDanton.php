<?php

namespace App\Filament\Resources\AspekDantonResource\Pages;

use App\Filament\Resources\AspekDantonResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAspekDanton extends EditRecord
{
    protected static string $resource = AspekDantonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
