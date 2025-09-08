<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;
use App\Exports\PemeringkatanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\RekapNilai;
use App\Models\NamaJuara;

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
    // Ambil ranking utama
    $rekap = RekapNilai::with('peserta')
        ->when($this->tingkat !== 'all', function ($q) {
            $q->whereHas('peserta', function ($q2) {
                $q2->where('tingkat', $this->tingkat);
            });
        })
        ->orderByDesc('total_utama')
        ->get();

    // Ambil daftar juara sesuai peringkat
    $juaraList = NamaJuara::orderBy('peringkat', 'asc')
        ->pluck('nama_juara'); // ['Juara Utama 1', 'Juara Utama 2', ...]

    // Pasangkan juara ke hasil ranking
    foreach ($rekap as $index => $item) {
        $item->nama_juara = $juaraList[$index] ?? null;
    }

    return $rekap;
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