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
use App\Exports\RekapNilaiExport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Actions\Action;

class ListRekapNilais extends ListRecords
{
    protected static string $resource = RekapNilaiResource::class;

    public function mount(): void
    {
        parent::mount();
        $this->updateRekapData();
    }


protected function getHeaderActions(): array
{
    return [
        Actions\CreateAction::make(),
        Action::make('export')
            ->label('Export Excel')
            ->color('success')
            ->action(fn () => Excel::download(new RekapNilaiExport, 'rekap_nilai.xlsx')),
    ];
}

   private function updateRekapData(): void
{
    $records = RekapNilai::all();

    foreach ($records as $rekap) {
        $nilai_pbb = PenilaianPBB::where('id_peserta', $rekap->id_peserta)->avg('nilai') ?? 0;
        $nilai_danton = PenilaianDanton::where('id_peserta', $rekap->id_peserta)->avg('nilai') ?? 0;
        $nilai_kostum = PenilaianSeragam::where('id_peserta', $rekap->id_peserta)->avg('nilai') ?? 0;
        $nilai_tata_rias = PenilaianTataRias::where('id_peserta', $rekap->id_peserta)->avg('nilai') ?? 0;
        $nilai_variasi_formasi = PenilaianVariasiFormasi::where('id_peserta', $rekap->id_peserta)->avg('nilai') ?? 0;

        // Total pengurangan (pakai accessor nilai_pengurangan di model)
        $nilai_pengurangan = PenguranganNilai::where('id_peserta', $rekap->id_peserta)
            ->with('aspek')
            ->get()
            ->sum(fn ($pengurangan) => $pengurangan->nilai_pengurangan ?? 0);

        // Hitung total
        $total_utama = $nilai_pbb + $nilai_danton - $nilai_pengurangan;
        $total_umum = $nilai_pbb + $nilai_danton + $nilai_variasi_formasi + $nilai_kostum;

        // Update ke tabel rekap
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


  
}
