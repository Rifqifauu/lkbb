<?php

namespace App\Filament\Resources\AspekVariasiFormasiResource\Pages;

use App\Filament\Resources\AspekVariasiFormasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAspekVariasiFormasis extends ListRecords
{
    protected static string $resource = AspekVariasiFormasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
   protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\AspekVariasiFormasiResource\Widgets\AspekVariasiFormasi::class,
        ];
    }
}
