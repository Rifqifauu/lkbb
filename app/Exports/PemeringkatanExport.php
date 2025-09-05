<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PemeringkatanExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets = [
            new RankingUtamaSheet(),
            new RankingUmumSheet(),
        ];

        $aspek = [
            'nilai_pbb' => 'PBB',
            'nilai_danton' => 'Danton',
            'nilai_kostum' => 'Kostum',
            'nilai_tata_rias' => 'Tata Rias',
            'nilai_variasi_formasi' => 'Variasi Formasi',
        ];

        foreach ($aspek as $field => $label) {
            $sheets[] = new JuaraPerAspekSheet($field, $label);
        }

        return $sheets;
    }
}
