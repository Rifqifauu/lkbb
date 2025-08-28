<?php

namespace App\Filament\Resources\AspekSeragamResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\AspekSeragam as AspekModel;

class AspekSeragam extends BaseWidget
{
    protected function getStats(): array
    {
        $totalNilai = AspekModel::sum('baik_3');
   
        $totalAspek = AspekModel::count();
        return [
            Stat::make('Total Nilai', number_format($totalNilai))
                ->description('Nilai maksimal aspek penilaian')
                ->color('success')
                ->icon('heroicon-o-chart-bar'),
            Stat::make('Total Aspek', $totalAspek)
                ->description('Jumlah aspek penilaian')
                ->color('primary')
                ->icon('heroicon-o-rectangle-stack'),
        ];
    }
}
