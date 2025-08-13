<?php

namespace App\Filament\Resources\PenilaianTataRiasResource\Pages;

use App\Filament\Resources\PenilaianTataRiasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenilaianTataRias extends ListRecords
{
    protected static string $resource = PenilaianTataRiasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
