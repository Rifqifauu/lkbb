<?php

namespace App\Exports;

use App\Models\RekapNilai;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RankingUmumSheet implements FromArray, WithTitle, WithHeadings
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
        
        return $query->orderByDesc('total_umum')
            ->get()
            ->map(function ($rekap, $index) {
                return [
                    'rank' => $index + 1,
                    'peserta' => $rekap->peserta->nama ?? '-',
                    'tingkat' => $rekap->peserta->tingkat ?? '-',
                    'total_umum' => $rekap->total_umum,
                ];
            })->toArray();
    }

    public function title(): string
    {
        $tingkatText = $this->tingkat !== 'all' ? " - {$this->tingkat}" : '';
        return 'Ranking Umum' . $tingkatText;
    }

    public function headings(): array
    {
        return [
            'Rank',
            'Peserta',
            'Tingkat',
            'Total Umum',
        ];
    }
}