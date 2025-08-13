<?php

namespace App\Filament\Resources\PenilaianPBBResource\Pages;

use App\Filament\Resources\PenilaianPBBResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenilaianPBB extends EditRecord
{
    protected static string $resource = PenilaianPBBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
