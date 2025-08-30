<?php

namespace App\Exports;

use App\Models\RekapNilai;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RankingUtamaSheet implements FromArray, WithTitle, WithHeadings
{
    public function array(): array
    {
        return RekapNilai::with('peserta')
            ->orderByDesc('total_utama')
            ->get()
            ->map(function ($rekap, $index) {
                return [
                    'rank' => $index + 1,
                    'peserta' => $rekap->peserta->nama ?? '-',
                    'total_utama' => $rekap->total_utama,
                    'total_umum' => $rekap->total_umum,
                    'nilai_pbb' => $rekap->nilai_pbb,
                    'nilai_danton' => $rekap->nilai_danton,
                    'nilai_kostum' => $rekap->nilai_kostum,
                    'nilai_tata_rias' => $rekap->nilai_tata_rias,
                    'nilai_variasi_formasi' => $rekap->nilai_variasi_formasi,
                ];
            })->toArray();
    }

    public function title(): string
    {
        return 'Ranking Utama';
    }

    public function headings(): array
    {
        return [
            'Rank',
            'Peserta',
            'Total Utama',
            'Total Umum',
            'PBB',
            'Danton',
            'Kostum',
            'Tata Rias',
            'Variasi Formasi',
        ];
    }
}
