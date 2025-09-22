<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AspekDantonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('aspek_danton')->insert([
            // 1. Penguasaan Materi
            [
                'nama_penilaian' => 'Penguasaan Materi',
                'kurang_1' => 44, 'kurang_2' => 46, 'kurang_3' => 48,
                'cukup_1'  => 50, 'cukup_2'  => 52, 'cukup_3'  => 54,
                'baik_1'   => 56, 'baik_2'   => 58, 'baik_3'   => 60,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            // 2. Sikap PBB
            [
                'nama_penilaian' => 'Sikap PBB',
                'kurang_1' => 39, 'kurang_2' => 41, 'kurang_3' => 43,
                'cukup_1'  => 45, 'cukup_2'  => 47, 'cukup_3'  => 49,
                'baik_1'   => 51, 'baik_2'   => 53, 'baik_3'   => 55,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            // 3. Kelantangan Suara
            [
                'nama_penilaian' => 'Kelantangan Suara',
                'kurang_1' => 49, 'kurang_2' => 51, 'kurang_3' => 53,
                'cukup_1'  => 55, 'cukup_2'  => 57, 'cukup_3'  => 59,
                'baik_1'   => 61, 'baik_2'   => 63, 'baik_3'   => 65,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            // 4. Intonasi & Artikulasi
            [
                'nama_penilaian' => 'Intonasi & Artikulasi',
                'kurang_1' => 47, 'kurang_2' => 49, 'kurang_3' => 51,
                'cukup_1'  => 53, 'cukup_2'  => 55, 'cukup_3'  => 57,
                'baik_1'   => 59, 'baik_2'   => 61, 'baik_3'   => 63,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            // 5. Penguasaan Lapangan
            [
                'nama_penilaian' => 'Penguasaan Lapangan',
                'kurang_1' => 41, 'kurang_2' => 43, 'kurang_3' => 45,
                'cukup_1'  => 47, 'cukup_2'  => 49, 'cukup_3'  => 51,
                'baik_1'   => 53, 'baik_2'   => 55, 'baik_3'   => 57,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
