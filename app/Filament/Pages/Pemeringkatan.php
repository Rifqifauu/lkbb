<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\RekapNilai;

class Pemeringkatan extends Page
{
    protected static string $view = 'filament.pages.pemeringkatan';

    // Daftar aspek penilaian
    public function getAspek(): array
    {
        return [
            'nilai_pbb' => 'PBB',
            'nilai_danton' => 'Danton',
            'nilai_kostum' => 'Kostum',
            'nilai_tata_rias' => 'Tata Rias',
            'nilai_variasi_formasi' => 'Variasi Formasi',
        ];
    }

    // Ranking Utama (semua peserta)
    public function getUtama()
    {
        return RekapNilai::with('peserta')->orderByDesc('total_utama')->get();
    }

    // Ranking Umum (semua peserta)
    public function getUmum()
    {
        return RekapNilai::with('peserta')->orderByDesc('total_umum')->get();
    }

    // Juara tiap aspek (3 tertinggi)
    public function getJuaraPerAspek()
    {
        $result = [];
        foreach ($this->getAspek() as $key => $label) {
            $top3 = RekapNilai::with('peserta')
                        ->orderByDesc($key)
                        ->take(3)
                        ->get();
            $result[$label] = $top3;
        }
        return $result;
    }
}
