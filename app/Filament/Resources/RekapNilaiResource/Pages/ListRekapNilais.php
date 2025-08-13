<?php

namespace App\Filament\Resources\RekapNilaiResource\Pages;

use App\Filament\Resources\RekapNilaiResource;
use App\Models\PenguranganNilai;
use App\Models\PenilaianPBB;
use App\Models\PenilaianDanton;
use App\Models\PenilaianSeragam;
use App\Models\PenilaianTataRias;
use App\Models\PenilaianVariasiFormasi;
use App\Models\RekapNilai;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRekapNilais extends ListRecords
{
    protected static string $resource = RekapNilaiResource::class;

    public function mount(): void
    {
        parent::mount();
        $this->updateRekapData();
    }

    private function updateRekapData(): void
    {
        $records = RekapNilai::all();

        foreach ($records as $rekap) {
            $nilai_pbb = PenilaianPBB::where('id_peserta', $rekap->id_peserta)->average('nilai');
            $nilai_danton = PenilaianDanton::where('id_peserta', $rekap->id_peserta)->average('nilai');
            $nilai_kostum = PenilaianSeragam::where('id_peserta', $rekap->id_peserta)->average('nilai');
            $nilai_tata_rias = PenilaianTataRias::where('id_peserta', $rekap->id_peserta)->average('nilai');
            $nilai_variasi_formasi = PenilaianVariasiFormasi::where('id_peserta', $rekap->id_peserta)->average('nilai');
            $nilai_pengurangan = PenguranganNilai::where('id_peserta', $rekap->id_peserta)->with('aspek') // Pastikan relasi 'aspek' dimuat
    ->get()
    ->avg(function($pengurangan) {
        return $pengurangan->aspek->pengurangan; // Mengakses 'pengurangan' dari relasi 'aspek'
    });
            $total_utama = $nilai_pbb + $nilai_danton - $nilai_pengurangan;
            $total_umum = $nilai_pbb + $nilai_danton + $nilai_variasi_formasi + $nilai_kostum;

            $rekap->update([
                'nilai_pbb' => $nilai_pbb,
                'nilai_danton' => $nilai_danton,
                'nilai_kostum' => $nilai_kostum,
                'nilai_tata_rias' => $nilai_tata_rias,
                'nilai_variasi_formasi' => $nilai_variasi_formasi,
                'nilai_pengurangan' => $nilai_pengurangan,
                'total_utama' => $total_utama,
                'total_umum' => $total_umum,
            ]);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
