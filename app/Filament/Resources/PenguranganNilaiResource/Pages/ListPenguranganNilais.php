<?php

namespace App\Filament\Resources\PenguranganNilaiResource\Pages;

use App\Filament\Resources\PenguranganNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenguranganNilais extends ListRecords
{
    protected static string $resource = PenguranganNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
