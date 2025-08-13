<?php

namespace App\Filament\Resources\AspekVariasiFormasiResource\Pages;

use App\Filament\Resources\AspekVariasiFormasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAspekVariasiFormasi extends EditRecord
{
    protected static string $resource = AspekVariasiFormasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
