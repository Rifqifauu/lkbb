<?php

namespace App\Filament\Resources\AspekPBBResource\Pages;

use App\Filament\Resources\AspekPBBResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAspekPBB extends CreateRecord
{
    protected static string $resource = AspekPBBResource::class;
     protected function getRedirectUrl(): string
    {
        // Setelah klik Create → tetap di halaman create lagi
        return static::getResource()::getUrl('create');
    }
}
