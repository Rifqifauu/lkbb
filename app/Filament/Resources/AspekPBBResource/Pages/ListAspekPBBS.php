<?php

namespace App\Filament\Resources\AspekPBBResource\Pages;

use App\Filament\Resources\AspekPBBResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAspekPBBS extends ListRecords
{
    protected static string $resource = AspekPBBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\AspekPBBResource\Widgets\AspekPBB::class,
        ];
    }
}
