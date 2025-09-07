<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PemeringkatanExport implements WithMultipleSheets
{
    protected $tingkat;

    public function __construct($tingkat = 'all')
    {
        $this->tingkat = $tingkat;
    }

    public function sheets(): array
    {
        $sheets = [
            new RankingUtamaSheet($this->tingkat),
            new RankingUmumSheet($this->tingkat),
        ];

        $aspek = [
            'nilai_pbb' => 'PBB',
            'nilai_danton' => 'Danton',
            'nilai_kostum' => 'Kostum',
            'nilai_tata_rias' => 'Tata Rias',
            'nilai_variasi_formasi' => 'Variasi Formasi',
        ];

        foreach ($aspek as $field => $label) {
            $sheets[] = new JuaraPerAspekSheet($field, $label, $this->tingkat);
        }

        return $sheets;
    }
}