<?php

namespace App\Filament\Resources\PenilaianDantonResource\Pages;

use App\Filament\Resources\PenilaianDantonResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Htmlable;

class ListPenilaianDantonSLTP extends ListRecords
{
    protected static string $resource = PenilaianDantonResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Penilaian Danton — SLTP';
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->whereHas('peserta', fn (Builder $q) => $q->where('tingkat', 'sltp'));
    }
}
