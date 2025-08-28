<?php

namespace App\Filament\Resources\RekapNilaiResource\Pages;

use App\Filament\Resources\RekapNilaiResource;
use App\Models\PenilaianPBB;
use App\Models\PenilaianDanton;
use App\Models\PenilaianSeragam;
use App\Models\PenilaianTataRias;
use App\Models\PenilaianVariasiFormasi;
use Filament\Actions;
use App\Models\RekapNilai;
use App\Models\PenguranganNilai;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateRekapNilai extends CreateRecord
{
    protected static string $resource = RekapNilaiResource::class;

    public function handleRecordCreation(array $data): Model
    {
        $nilai_pbb = PenilaianPBB::where('id_peserta', $data['id_peserta'])->average('nilai');
        $nilai_danton = PenilaianDanton::where('id_peserta', $data['id_peserta'])->average('nilai'); // Sum of nilai_danton from PenilaianDanton
        $nilai_kostum = PenilaianSeragam::where('id_peserta', $data['id_peserta'])->average('nilai'); // Sum of nilai_kostum from PenilaianKostum
        $nilai_tata_rias = PenilaianTataRias::where('id_peserta', $data['id_peserta'])->average('nilai'); // Sum of nilai_tata_rias from PenilaianTataRias
        $nilai_variasi_formasi = PenilaianVariasiFormasi::where('id_peserta', $data['id_peserta'])->average('nilai'); // Sum of nilai_penampilan from PenilaianPenampilan
$nilai_pengurangan = PenguranganNilai::where('id_peserta', $data['id_peserta'])
    ->with('aspek') // Pastikan relasi 'aspek' dimuat
    ->get()
    ->avg(function($pengurangan) {
        return $pengurangan->aspek->pengurangan; // Mengakses 'pengurangan' dari relasi 'aspek'
    });

        // Calculate totals
          $total_utama = $nilai_pbb + $nilai_danton - $nilai_pengurangan;
            $total_umum = $nilai_pbb + $nilai_danton + $nilai_variasi_formasi + $nilai_kostum;

        // Create the RekapNilai record
        $rekapNilai = RekapNilai::create([
            'id_peserta' => $data['id_peserta'],
            'waktu' => $data['waktu'],
            'nilai_pbb' => $nilai_pbb,
            'nilai_danton' => $nilai_danton,
            'nilai_kostum' => $nilai_kostum,
            'nilai_tata_rias' => $nilai_tata_rias,
            'nilai_variasi_formasi' => $nilai_variasi_formasi, // Assuming this is the correct field for nilai_penampilan
            'nilai_pengurangan' => $nilai_pengurangan, // Assuming this is the correct field for nilai_penampilan
            'total_utama' => $total_utama, // Store total_utama in the record
            'total_umum' => $total_umum,   // Store total_umum in the record
        ]);

        return $rekapNilai;
    }
}
