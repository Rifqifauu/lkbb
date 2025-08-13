<?php

namespace App\Filament\Resources\AspekTataRiasResource\Pages;

use App\Filament\Resources\AspekTataRiasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAspekTataRias extends ListRecords
{
    protected static string $resource = AspekTataRiasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\AspekTataRiasResource\Widgets\AspekTataRias::class,
        ];
    }

    // You can add more methods or override existing ones as needed
}
