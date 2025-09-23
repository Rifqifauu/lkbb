<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AspekPBBSDSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // HANYA bersihkan data SD/MI agar tidak dobel saat seed ulang
        DB::table('aspek_pbb')->where('tingkat', 'sd')->delete();

        // 25 aspek SD/MI (sesuai gambar)
        $aspekSD = [
            'Langkah Tegap',
            'Ganti Langkah',
            'Langkah Biasa',
            'Belok Kanan',
            'Tiap-Tiap Banjar 2 Kali Belok Kanan',
            'Belok Kiri',
            'Hormat Kanan',
            'Tiap-Tiap Banjar 2 Kali Belok Kiri',
            'Langkah Perlahan',
            'Henti',
            'Lencang Depan',
            'Buka Barisan',
            'Tutup Barisan',
            '4 Ke Belakang',
            '3 Langkah Ke Kanan',
            '4 Langkah Ke Kiri',
            '2 Langkah Ke Depan',
            'Balik Kanan Jalan Di Tempat',
            'Hadap Kanan Henti',
            'Setengah Lengan Lencang Kanan',
            'Lencang Kanan',
            'Hitung',
            'Hormat',
            'Bubar',
            'Berkumpul',
        ];

        $rows = [];
        foreach ($aspekSD as $nama) {
            $rows[] = [
                'nama_penilaian' => $nama,
                'tingkat'        => 'sd',
                // skala poin per juri (maks = baik_3)
                'kurang_1' => 40,
                'kurang_2' => 42,
                'kurang_3' => 44,
                'cukup_1'  => 46,
                'cukup_2'  => 48,
                'cukup_3'  => 50,
                'baik_1'   => 52,
                'baik_2'   => 54,
                'baik_3'   => 56,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('aspek_pbb')->insert($rows);
    }
}
