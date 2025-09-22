<?php

namespace App\Filament\Resources\PenilaianPBBResource\Pages;

use App\Filament\Resources\PenilaianPBBResource;
use App\Models\Peserta;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListPenilaianPBBS extends ListRecords
{
    protected static string $resource = PenilaianPBBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            // 'all' => Tab::make('Semua')
            //     ->badge(fn() => Peserta::count()),

            'sd' => Tab::make('SD')
                ->modifyQueryUsing(
                    fn($query) =>
                    $query->whereHas('peserta', fn($q) => $q->where('tingkat', 'sd'))
                )
                ->badge(fn() => Peserta::where('tingkat', 'sd')->count())
                ->badgeColor('warning'),

            'sltp' => Tab::make('SLTP')
                ->modifyQueryUsing(
                    fn($query) =>
                    $query->whereHas('peserta', fn($q) => $q->where('tingkat', 'sltp'))
                )
                ->badge(fn() => Peserta::where('tingkat', 'sltp')->count())
                ->badgeColor('danger'),

            'slta' => Tab::make('SLTA')
                ->modifyQueryUsing(
                    fn($query) =>
                    $query->whereHas('peserta', fn($q) => $q->where('tingkat', 'slta'))
                )
                ->badge(fn() => Peserta::where('tingkat', 'slta')->count())
                ->badgeColor('success'),
        ];
    }
}
