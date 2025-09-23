<?php

namespace App\Filament\Resources\AspekPBBResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\AspekPBB as AspekModel;

class AspekPBB extends BaseWidget
{
    protected function getStats(): array
    {
        // =========================================
        // Konstanta batas nilai maksimum per juri
        // =========================================
        $CAP_PER_JURI = 1066.7;

        // =========================
        // Ambil data per kategori
        // =========================
        // SD/MI disimpan sebagai 'sd'
        $aspekSd = AspekModel::where('tingkat', 'sd')->get();

        // SMP & SMA disatukan sebagai 'smp_sma'
        $aspekSmpSma = AspekModel::where('tingkat', 'sltp_slta')->get();

        // =========================================
        // Hitung total nilai mentah (pakai BAik_3)
        // -> sesuai kesepakatan: maksimum aspek = baik_3
        // =========================================
        $sdRaw        = (float) $aspekSd->sum('baik_3');
        $smpSmaRaw    = (float) $aspekSmpSma->sum('baik_3');

        // =========================================
        // Terapkan CAP dan pembulatan konsisten
        // (gunakan floor agar tidak pernah melebihi batas)
        // Jika mau "ke terdekat", ganti floor(...) => round(...)
        // =========================================
        $sdCapped     = min($sdRaw, $CAP_PER_JURI);
        $sdDisplay    = (int) floor($sdCapped + 1e-6);        // <-- ubah ke round(...) bila diinginkan

        $smpSmaCapped = min($smpSmaRaw, $CAP_PER_JURI);
        $smpSmaDisplay= (int) floor($smpSmaCapped + 1e-6);    // <-- ubah ke round(...) bila diinginkan

        // =========================================
        // Hitung jumlah aspek
        // =========================================
        $totalAspekSd     = $aspekSd->count();
        $totalAspekSmpSma = $aspekSmpSma->count();

        // =========================================
        // Kembalikan 4 kartu statistik
        // =========================================
        return [
            Stat::make('Total Nilai SD/MI', number_format($sdDisplay, 0))
                ->description('Nilai maksimal formulasi SD/MI (per juri)')
                ->color('success')
                ->icon('heroicon-o-chart-bar'),

            Stat::make('Total Formulasi SD/MI', number_format($totalAspekSd))
                ->description('Jumlah formulasi SD/MI')
                ->color('warning')
                ->icon('heroicon-o-rectangle-stack'),

            Stat::make('Total Nilai SMP & SMA', number_format($smpSmaDisplay, 0))
                ->description('Nilai maksimal formulasi SMP & SMA (per juri)')
                ->color('success')
                ->icon('heroicon-o-chart-bar'),

            Stat::make('Total Formulasi SMP & SMA', number_format($totalAspekSmpSma))
                ->description('Jumlah formulasi SMP & SMA')
                ->color('warning')
                ->icon('heroicon-o-rectangle-stack'),
        ];
    }
}
