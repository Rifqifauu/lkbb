<?php

namespace App\Filament\Resources\AspekDantonResource\Pages;

use App\Filament\Resources\AspekDantonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAspekDantons extends ListRecords
{
    protected static string $resource = AspekDantonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\AspekDantonResource\Widgets\AspekDanton::class,
        ];
    }
}
