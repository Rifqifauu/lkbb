<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AspekVariasiFormasiSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            // ===== MATERI VARIASI – KREATIVITAS =====
            ['Opening Variasi', 2, 3, 4, 5, 6, 7],
            ['Karakter/Tema & Pembukaan Isi Pesan', 2, 3, 4, 5, 6, 7],
            ['Karakter dan Originalitas Penampilan', 3, 4, 5, 6, 7, 8],

            // ===== DINAMIKA & STRUKTUR GERAKAN =====
            ['Kesesuaian Gerakan dengan Isi Pesan', 2, 3, 4, 5, 6, 7],
            ['Estetika Kesopanan & Keamanan Gerakan', 2, 3, 4, 5, 6, 7],
            ['Tingkat Kesulitan & Detail Gerakan', 3, 4, 5, 6, 7, 8],
            ['Kerapihan & Kekompakan Gerakan', 2, 3, 4, 5, 6, 7],
            ['Kesesuaian Format Barisan', 2, 3, 4, 5, 6, 7],

            // ===== PERFORMANCE =====
            ['Semangat dan Kestabilan Penampilan (Variasi)', 2, 3, 4, 5, 6, 7],

            // ===== PASUKAN =====
            ['Penjiwaan dalam Penampilan & Artikulasi, Intonasi (Variasi)', 1, 2, 3, 4, 5, 6],
            ['Semangat dan Kestabilan Penampilan (Pasukan)', 2, 3, 4, 5, 6, 7],

            // ===== KOMANDAN (Variasi) =====
            ['Penjiwaan Komandan: Penampilan & Artikulasi, Intonasi', 1, 2, 3, 4, 5, 6],
            ['Semangat & Kestabilan Penampilan (Komandan)', 1, 2, 3, 4, 5, 6],
            ['Penguasaan Lapangan, Materi & Aba-aba (Komandan)', 1, 2, 3, 4, 5, 6],

            // ===== MATERI FORMASI – KREATIVITAS =====
            ['Pengembangan Isi Pesan', 1, 2, 3, 4, 5, 6],
            ['Karakter dan Originalitas Penampilan (Formasi)', 3, 4, 5, 6, 7, 8],
            ['Ending Celebration (dilakukan setelah Tutup Formasi)', 3, 4, 5, 6, 7, 8],

            // ===== DINAMIKA & STRUKTUR GERAKAN (Formasi) =====
            ['Kesesuaian Gerakan dengan Isi Pesan (Formasi)', 3, 4, 5, 6, 7, 8],
            ['Estetika Kesopanan & Keamanan Gerakan (Formasi)', 2, 3, 4, 5, 6, 7],
            ['Tingkat Kesulitan & Detail Gerakan (Formasi)', 3, 4, 5, 6, 7, 8],

            // ===== PROSES BUKA TUTUP & BENTUK AKHIR FORMASI =====
            ['Kelurusan Saf Banjar & Jarak Simetris', 1, 2, 3, 4, 5, 6],
            ['Kerapihan & Kekompakan Gerakan (Formasi)', 2, 3, 4, 5, 6, 7],
            ['Tingkat Kesulitan & Detail Gerakan (Penutup)', 2, 3, 4, 5, 6, 7],

            // ===== PERFORMANCE (Formasi) =====
            ['Semangat dan Kestabilan Penampilan (Formasi)', 2, 3, 4, 5, 6, 7],

            // ===== PASUKAN (Formasi) =====
            ['Penjiwaan: Penampilan & Artikulasi, Intonasi (Formasi)', 1, 2, 3, 4, 5, 6],
            ['Semangat & Kestabilan Penampilan (Pasukan, Formasi)', 2, 3, 4, 5, 6, 7],

            // ===== KOMANDAN (Formasi) =====
            ['Penjiwaan Komandan: Artikulasi & Intonasi (Formasi)', 1, 2, 3, 4, 5, 6],
            ['Semangat & Kestabilan Penampilan (Komandan, Formasi)', 2, 3, 4, 5, 6, 7],
            ['Penguasaan Lapangan, Materi & Aba-aba (Komandan, Formasi)', 1, 2, 3, 4, 5, 6],
        ];


        $now = Carbon::now();
        $data = [];

        foreach ($rows as $r) {
            $data[] = [
                'nama_penilaian' => $r[0],
                'kurang_1' => $r[1],
                'kurang_2' => $r[2],
                'cukup_1'  => $r[3],
                'cukup_2'  => $r[4],
                'baik_1'   => $r[5],
                'baik_2'   => $r[6],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('aspek_variasi_formasi')->truncate();
        DB::table('aspek_variasi_formasi')->insert($data);
    }
}
