<?php

namespace App\Filament\Resources\AspekPenguranganNilaiResource\Pages;

use App\Filament\Resources\AspekPenguranganNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAspekPenguranganNilai extends EditRecord
{
    protected static string $resource = AspekPenguranganNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
