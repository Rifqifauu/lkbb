<?php

namespace App\Filament\Resources\AspekPenguranganNilaiResource\Pages;

use App\Filament\Resources\AspekPenguranganNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAspekPenguranganNilais extends ListRecords
{
    protected static string $resource = AspekPenguranganNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
