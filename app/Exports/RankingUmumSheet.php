<?php

namespace App\Exports;

use App\Models\RekapNilai;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RankingUmumSheet implements FromArray, WithTitle, WithHeadings
{
    public function array(): array
    {
        return RekapNilai::with('peserta')
            ->orderByDesc('total_umum')
            ->get()
            ->map(function ($rekap, $index) {
                return [
                    'rank' => $index + 1,
                    'peserta' => $rekap->peserta->nama ?? '-',
                    'total_umum' => $rekap->total_umum,
                ];
            })->toArray();
    }

    public function title(): string
    {
        return 'Ranking Umum';
    }

    public function headings(): array
    {
        return [
            'Rank',
            'Peserta',
            'Total Umum',
        ];
    }
}
