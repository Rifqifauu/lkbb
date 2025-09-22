<?php

namespace App\Filament\Resources\PesertaResource\Pages;

use App\Filament\Resources\PesertaResource;
use App\Models\Peserta; // <— pakai model langsung
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPesertas extends ListRecords
{
    protected static string $resource = PesertaResource::class;

    protected function getHeaderActions(): array
    {
        return [ Actions\CreateAction::make() ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua')
                ->badge(fn () => Peserta::count()),

            'sd' => Tab::make('SD')
                ->modifyQueryUsing(function ($query) {
                    return $query->where('tingkat', 'sd');
                })
                ->badge(fn () => Peserta::where('tingkat', 'sd')->count())
                ->badgeColor('warning'),
            'smp' => Tab::make('SLTP')
                ->modifyQueryUsing(function ($query) {
                    return $query->where('tingkat', 'sltp');
                })
                ->badge(fn () => Peserta::where('tingkat', 'sltp')->count())
                ->badgeColor('danger'),
            'sma' => Tab::make('SLTA')
                ->modifyQueryUsing(function ($query) {
                    return $query->where('tingkat', 'slta');
                })
                ->badge(fn () => Peserta::where('tingkat', 'slta')->count())
                ->badgeColor('success'),  
        ];
    }
}
