<?php

namespace App\Filament\Resources\PenilaianVariasiFormasiResource\Pages;

use App\Filament\Resources\PenilaianVariasiFormasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenilaianVariasiFormasi extends EditRecord
{
    protected static string $resource = PenilaianVariasiFormasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
