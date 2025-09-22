<?php

namespace App\Filament\Resources\PesertaResource\Pages;

use App\Filament\Resources\PesertaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePeserta extends CreateRecord
{
    protected static string $resource = PesertaResource::class;
    protected function getRedirectUrl(): string
    {
        // Redirect kembali ke halaman create
        return static::getResource()::getUrl('create');
    }
}
