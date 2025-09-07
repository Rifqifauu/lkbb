<?php

namespace App\Exports;

use App\Models\RekapNilai;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JuaraPerAspekSheet implements FromArray, WithTitle, WithHeadings
{
    protected string $field;
    protected string $label;
    protected $tingkat;

    public function __construct(string $field, string $label, $tingkat = 'all')
    {
        $this->field = $field;
        $this->label = $label;
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
        
        return $query->orderByDesc($this->field)
            ->take(10) // Top 10 untuk data lebih lengkap
            ->get()
            ->map(function ($rekap, $index) {
                return [
                    'rank' => $index + 1,
                    'peserta' => $rekap->peserta->nama ?? '-',
                    'tingkat' => $rekap->peserta->tingkat ?? '-',
                    'nilai' => $rekap->{$this->field},
                ];
            })->toArray();
    }

    public function title(): string
    {
        $tingkatText = $this->tingkat !== 'all' ? " - {$this->tingkat}" : '';
        return 'Juara ' . $this->label . $tingkatText;
    }

    public function headings(): array
    {
        return [
            'Rank',
            'Peserta',
            'Tingkat',
            'Nilai ' . $this->label,
        ];
    }
}