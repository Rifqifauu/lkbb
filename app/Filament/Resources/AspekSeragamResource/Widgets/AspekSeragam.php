<?php

namespace App\Filament\Resources\AspekSeragamResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\AspekSeragam as AspekModel;

class AspekSeragam extends BaseWidget
{
    protected function getStats(): array
    {
        $totalNilai = AspekModel::sum('kurang_1')
            + AspekModel::sum('kurang_2')
            + AspekModel::sum('cukup_1')
            + AspekModel::sum('cukup_2')
            + AspekModel::sum('baik_1')
            + AspekModel::sum('baik_2');
        $totalAspek = AspekModel::count();
        return [
            Stat::make('Total Nilai', number_format($totalNilai))
                ->description('Akumulasi semua penilaian')
                ->color('success')
                ->icon('heroicon-o-chart-bar'),
            Stat::make('Total Aspek', $totalAspek)
                ->description('Jumlah aspek penilaian')
                ->color('primary')
                ->icon('heroicon-o-rectangle-stack'),
        ];
    }
}
