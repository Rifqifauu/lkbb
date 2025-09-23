<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AspekPBBSeeder extends Seeder
{
    /**
     * Batas total maksimum PBB untuk SATU juri.
     * 3200 total untuk 3 juri => 1066.66.. -> kita pakai 1066 agar tidak pernah melewati.
     */
    private const KUOTA_PER_JURI = 1066; // ubah jika kebijakan berubah

    public function run(): void
    {
        // 1) Template daftar aspek SMP+SMA (gabungan sltp_slta)
        $aspekList = [
            'Langkah Biasa',
            'Ganti Langkah',
            'Belok Kanan',
            'Hadap Kanan Maju',
            'Lari',
            'Balik Kanan Langkah Biasa',
            'Langkah Perlahan',
            'Haluan Kanan',
            'Hadap Kanan Maju',
            'Dua Kali Belok Kanan',
            'Tiap-Tiap Banjar 2x Belok Kanan',
            'Hormat Kanan',
            'Tiap-Tiap Banjar 2x Belok Kiri',
            'Henti',
            'Lencang Depan',
            'Buka Barisan',
            'Tutup Barisan',
            'Hadap Serong Kiri',
            'Istirahat Ditempat',
            'Parade Istirahat Ditempat',
            'Periksa Kerapihan',
            'Balik Kanan Jalan Ditempat',
            'Hadap Serong Kanan',
            'Hadap Kanan Henti',
            'Hitung',
            'Setengah Lengan Lencang Kanan',
            'Lencang Kiri',
            '2 Langkah Ke Kanan',
            '4 Langkah Ke Kiri',
            '4 Langkah Kebelakang',
            '3 Langkah Ke Depan',
            'Hormat',
            'Bubar',
            'Berkumpul',
        ];

        // 2) Nilai dasar (akan di-skala)
        $base = [
            'kurang_1' => 40,
            'kurang_2' => 42,
            'kurang_3' => 44,
            'cukup_1'  => 46,
            'cukup_2'  => 48,
            'cukup_3'  => 50,
            'baik_1'   => 52,
            'baik_2'   => 54,
            'baik_3'   => 56,
        ];

        // 3) Bangun array data awal
        $now = Carbon::now();
        $rows = [];
        foreach ($aspekList as $aspek) {
            $rows[] = array_merge([
                'nama_penilaian' => $aspek,
                'tingkat'        => 'sltp_slta',
                'created_at'     => $now,
                'updated_at'     => $now,
            ], $base);
        }

        // 4) Hitung total maksimum saat ini (pakai kolom paling tinggi: baik_3)
        $totalAwal = array_sum(array_column($rows, 'baik_3'));

        // 5) Jika total melewati kuota per juri, lakukan scaling & distribusi sisa
        if ($totalAwal > self::KUOTA_PER_JURI) {
            $k = self::KUOTA_PER_JURI / $totalAwal;   // faktor skala

            // scale semua kolom (pakai floor agar tidak over-cap)
            foreach ($rows as &$r) {
                $vals = [
                    'kurang_1' => (int) floor($r['kurang_1'] * $k),
                    'kurang_2' => (int) floor($r['kurang_2'] * $k),
                    'kurang_3' => (int) floor($r['kurang_3'] * $k),
                    'cukup_1'  => (int) floor($r['cukup_1']  * $k),
                    'cukup_2'  => (int) floor($r['cukup_2']  * $k),
                    'cukup_3'  => (int) floor($r['cukup_3']  * $k),
                    'baik_1'   => (int) floor($r['baik_1']   * $k),
                    'baik_2'   => (int) floor($r['baik_2']   * $k),
                    'baik_3'   => (int) floor($r['baik_3']   * $k),
                ];

                // Pastikan urutan naik (kurang_1 < ... < baik_3)
                $keys = array_keys($vals);
                for ($i = 1; $i < count($keys); $i++) {
                    if ($vals[$keys[$i]] <= $vals[$keys[$i - 1]]) {
                        $vals[$keys[$i]] = $vals[$keys[$i - 1]] + 1;
                    }
                }

                foreach ($vals as $kField => $v) {
                    $r[$kField] = $v;
                }
            }
            unset($r);

            // cek total setelah floor + penjajaran
            $sumNow = array_sum(array_column($rows, 'baik_3'));
            $defisit = self::KUOTA_PER_JURI - $sumNow;

            // distribusikan sisa +1 ke beberapa baris (naikkan trio "baik" agar smooth)
            // urutkan baris dengan "gap" besar antara baik_3 dan baik_2 agar tetap wajar
            if ($defisit > 0) {
                usort($rows, function ($a, $b) {
                    $gapA = $a['baik_3'] - $a['baik_2'];
                    $gapB = $b['baik_3'] - $b['baik_2'];
                    // prioritas yang gap-nya kecil (biar naiknya rata)
                    return $gapA <=> $gapB;
                });

                $i = 0;
                $n = count($rows);
                while ($defisit > 0 && $n > 0) {
                    $rows[$i]['baik_1'] += 1;
                    $rows[$i]['baik_2'] += 1;
                    $rows[$i]['baik_3'] += 1;
                    // jaga urutan
                    if ($rows[$i]['baik_2'] <= $rows[$i]['baik_1']) $rows[$i]['baik_2'] = $rows[$i]['baik_1'] + 1;
                    if ($rows[$i]['baik_3'] <= $rows[$i]['baik_2']) $rows[$i]['baik_3'] = $rows[$i]['baik_2'] + 1;

                    $defisit--;
                    $i = ($i + 1) % $n;
                }
            }
        }

        // 6) Insert ke DB
        DB::table('aspek_pbb')->insert($rows);

        // (Opsional) validasi akhir saat seeding selesai:
        // $sum = DB::table('aspek_pbb')->where('tingkat','sltp_slta')->sum('baik_3');
        // info("Total baik_3 per-juri = $sum (kuota ".self::KUOTA_PER_JURI.")");
    }
}
