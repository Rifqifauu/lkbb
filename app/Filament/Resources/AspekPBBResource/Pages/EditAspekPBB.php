<?php

namespace App\Filament\Resources\AspekPBBResource\Pages;

use App\Filament\Resources\AspekPBBResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAspekPBB extends EditRecord
{
    protected static string $resource = AspekPBBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
