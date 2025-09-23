<?php

namespace App\Filament\Resources\PenilaianVariasiFormasiResource\Pages;

use App\Filament\Resources\PenilaianVariasiFormasiResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Htmlable;

class ListPenilaianVariasiFormasiSD extends ListRecords
{
    protected static string $resource = PenilaianVariasiFormasiResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Penilaian Variasi Formasi — SD';
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->whereHas('peserta', fn(Builder $q) => $q->where('tingkat', 'sd'));
    }
}
