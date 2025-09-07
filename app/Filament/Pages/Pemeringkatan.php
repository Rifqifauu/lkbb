<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;
use App\Exports\PemeringkatanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\RekapNilai;

class Pemeringkatan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static string $view = 'filament.pages.pemeringkatan';

    public ?string $tingkat = 'all';

    // Property yang akan di-watch untuk perubahan
    protected $queryString = ['tingkat'];

    // Method untuk handle perubahan filter
    public function updatedTingkat()
    {
        // Reset ke halaman pertama jika ada pagination
        // $this->resetPage(); // uncomment jika pakai pagination
    }

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

    // Ranking Utama (dengan filter tingkat)
    public function getUtama()
    {
        $query = RekapNilai::with('peserta');
        
        if ($this->tingkat !== 'all') {
            $query->whereHas('peserta', function ($q) {
                $q->where('tingkat', $this->tingkat);
            });
        }
        
        return $query->orderByDesc('total_utama')->get();
    }

    // Ranking Umum (dengan filter tingkat)
    public function getUmum()
    {
        $query = RekapNilai::with('peserta');
        
        if ($this->tingkat !== 'all') {
            $query->whereHas('peserta', function ($q) {
                $q->where('tingkat', $this->tingkat);
            });
        }
        
        return $query->orderByDesc('total_umum')->get();
    }

    // Juara tiap aspek (3 tertinggi, dengan filter tingkat)
    public function getJuaraPerAspek()
    {
        $result = [];
        foreach ($this->getAspek() as $key => $label) {
            $query = RekapNilai::with('peserta');
            
            if ($this->tingkat !== 'all') {
                $query->whereHas('peserta', function ($q) {
                    $q->where('tingkat', $this->tingkat);
                });
            }
            
            $top3 = $query->orderByDesc($key)->take(3)->get();
            $result[$label] = $top3;
        }
        return $result;
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('export')
                ->label('Export Excel')
                ->color('success')
                ->action(fn () => Excel::download(
                    new PemeringkatanExport($this->tingkat),
                    'pemeringkatan.xlsx'
                )),
        ];
    }
}