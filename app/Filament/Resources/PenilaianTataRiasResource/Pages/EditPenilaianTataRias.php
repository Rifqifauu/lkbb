<?php

namespace App\Filament\Resources\PenilaianTataRiasResource\Pages;

use App\Filament\Resources\PenilaianTataRiasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenilaianTataRias extends EditRecord
{
    protected static string $resource = PenilaianTataRiasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
