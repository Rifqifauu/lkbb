<?php

namespace App\Filament\Resources\PenilaianSeragamResource\Pages;

use App\Filament\Resources\PenilaianSeragamResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Htmlable;

class ListPenilaianSeragamSLTA extends ListRecords
{
    protected static string $resource = PenilaianSeragamResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Penilaian Kostum — SLTA';
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->whereHas('peserta', fn (Builder $q) => $q->where('tingkat', 'slta'));
    }
}
