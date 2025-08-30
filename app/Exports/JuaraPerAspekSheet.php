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

    public function __construct(string $field, string $label)
    {
        $this->field = $field;
        $this->label = $label;
    }

    public function array(): array
    {
        return RekapNilai::with('peserta')
            ->orderByDesc($this->field)
            ->take(3)
            ->get()
            ->map(function ($rekap, $index) {
                return [
                    'rank' => $index + 1,
                    'peserta' => $rekap->peserta->nama ?? '-',
                    'nilai' => $rekap->{$this->field},
                ];
            })->toArray();
    }

    public function title(): string
    {
        return 'Juara ' . $this->label;
    }

    public function headings(): array
    {
        return [
            'Rank',
            'Peserta',
            'Nilai ' . $this->label,
        ];
    }
}
