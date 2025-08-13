<?php

namespace App\Filament\Resources\PenilaianSeragamResource\Pages;

use App\Filament\Resources\PenilaianSeragamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenilaianSeragams extends ListRecords
{
    protected static string $resource = PenilaianSeragamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
