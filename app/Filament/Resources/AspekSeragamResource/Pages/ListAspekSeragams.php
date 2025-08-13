<?php

namespace App\Filament\Resources\AspekSeragamResource\Pages;

use App\Filament\Resources\AspekSeragamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAspekSeragams extends ListRecords
{
    protected static string $resource = AspekSeragamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\AspekSeragamResource\Widgets\AspekSeragam::class,
        ];
    }
}
