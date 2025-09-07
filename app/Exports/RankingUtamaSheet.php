<?php

namespace App\Exports;

use App\Models\RekapNilai;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RankingUtamaSheet implements FromArray, WithTitle, WithHeadings
{
    protected $tingkat;

    public function __construct($tingkat = 'all')
    {
        $this->tingkat = $tingkat;
    }

    public function array(): array
    {
        $query = RekapNilai::with('peserta');
        
        if ($this->tingkat !== 'all') {
            $query->whereHas('peserta', function ($q) {
                $q->where('tingkat', $this->tingkat);
            });
        }
        
        return $query->orderByDesc('total_utama')
            ->get()
            ->map(function ($rekap, $index) {
                return [
                    'rank' => $index + 1,
                    'peserta' => $rekap->peserta->nama ?? '-',
                    'tingkat' => $rekap->peserta->tingkat ?? '-',
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
        $tingkatText = $this->tingkat !== 'all' ? " - {$this->tingkat}" : '';
        return 'Ranking Utama' . $tingkatText;
    }

    public function headings(): array
    {
        return [
            'Rank',
            'Peserta',
            'Tingkat',
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