<?php

namespace App\Exports;

use App\Models\RekapNilai;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapNilaiExport implements FromCollection, WithHeadings
{
    protected $juris;

    public function __construct()
    {
        // ambil semua juri
        $this->juris = User::all();
    }

    public function collection()
    {
        return RekapNilai::with([
            'peserta',
            'penilaianPbb',
            'penilaianDanton',
            'penilaianSeragam',
            'penilaianTataRias',
            'penilaianVariasiFormasi',
        ])->get()->map(function ($rekap) {
            $row = [
                'peserta' => $rekap->peserta->nama,
                'waktu'   => $rekap->waktu,
            ];

            // nilai per juri
            foreach ($this->juris as $juri) {
                $row['pbb_'.$juri->id] = optional($rekap->penilaianPbb->firstWhere('id_user', $juri->id))->nilai;
                $row['danton_'.$juri->id] = optional($rekap->penilaianDanton->firstWhere('id_user', $juri->id))->nilai;
                $row['kostum_'.$juri->id] = optional($rekap->penilaianSeragam->firstWhere('id_user', $juri->id))->nilai;
                $row['tata_rias_'.$juri->id] = optional($rekap->penilaianTataRias->firstWhere('id_user', $juri->id))->nilai;
                $row['variasi_formasi_'.$juri->id] = optional($rekap->penilaianVariasiFormasi->firstWhere('id_user', $juri->id))->nilai;
            }

            // nilai rata-rata & total
            $row['nilai_pbb']            = $rekap->nilai_pbb;
            $row['nilai_danton']         = $rekap->nilai_danton;
            $row['nilai_kostum']         = $rekap->nilai_kostum;
            $row['nilai_tata_rias']      = $rekap->nilai_tata_rias;
            $row['nilai_variasi_formasi']= $rekap->nilai_variasi_formasi;
            $row['nilai_pengurangan']    = $rekap->nilai_pengurangan;
            $row['total_utama']          = $rekap->total_utama;
            $row['total_umum']           = $rekap->total_umum;

            return $row;
        });
    }

    public function headings(): array
    {
        $headings = [
            'Peserta',
            'Waktu',
        ];

        foreach ($this->juris as $juri) {
            $headings[] = 'Nilai PBB ('.$juri->name.')';
            $headings[] = 'Nilai Danton ('.$juri->name.')';
            $headings[] = 'Nilai Kostum ('.$juri->name.')';
            $headings[] = 'Nilai Tata Rias ('.$juri->name.')';
            $headings[] = 'Nilai Variasi Formasi ('.$juri->name.')';
        }

        return array_merge($headings, [
            'Rata-rata PBB',
            'Rata-rata Danton',
            'Rata-rata Kostum',
            'Rata-rata Tata Rias',
            'Rata-rata Variasi Formasi',
            'Pengurangan',
            'Total Utama',
            'Total Umum',
        ]);
    }
}
