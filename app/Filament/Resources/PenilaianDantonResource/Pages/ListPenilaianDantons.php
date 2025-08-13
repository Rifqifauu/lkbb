<?php

namespace App\Filament\Resources\PenilaianDantonResource\Pages;

use App\Filament\Resources\PenilaianDantonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenilaianDantons extends ListRecords
{
    protected static string $resource = PenilaianDantonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Penilaian'),
        ];
    }
}
