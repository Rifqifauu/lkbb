<?php

namespace App\Filament\Resources\PenilaianVariasiFormasiResource\Pages;

use App\Filament\Resources\PenilaianVariasiFormasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenilaianVariasiFormasis extends ListRecords
{
    protected static string $resource = PenilaianVariasiFormasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
