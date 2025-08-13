<?php

namespace App\Filament\Resources\PenilaianPBBResource\Pages;

use App\Filament\Resources\PenilaianPBBResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenilaianPBBS extends ListRecords
{
    protected static string $resource = PenilaianPBBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
