<?php

namespace App\Filament\Resources\PenilaianSeragamResource\Pages;

use App\Filament\Resources\PenilaianSeragamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenilaianSeragam extends EditRecord
{
    protected static string $resource = PenilaianSeragamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
