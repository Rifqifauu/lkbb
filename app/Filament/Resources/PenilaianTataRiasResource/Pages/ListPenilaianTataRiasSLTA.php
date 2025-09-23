<?php

namespace App\Filament\Resources\PenilaianTataRiasResource\Pages;

use App\Filament\Resources\PenilaianTataRiasResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Htmlable;

class ListPenilaianTataRiasSLTA extends ListRecords
{
    protected static string $resource = PenilaianTataRiasResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Penilaian Tata Rias — SD';
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->whereHas('peserta', fn (Builder $q) => $q->where('tingkat', 'slta'));
    }
}
