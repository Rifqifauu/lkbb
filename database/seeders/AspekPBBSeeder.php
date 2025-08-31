<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AspekPBBSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('aspek_pbb')->insert([
            [
                'nama_penilaian' => 'Langkah Tegap',
                'kurang_1' => 42, 'kurang_2' => 44, 'kurang_3' => 46,
                'cukup_1' => 48, 'cukup_2' => 50, 'cukup_3' => 52,
                'baik_1' => 54, 'baik_2' => 56, 'baik_3' => 58,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Tiap-tiap Banjar 2x Belok Kanan',
                'kurang_1' => 48, 'kurang_2' => 50, 'kurang_3' => 52,
                'cukup_1' => 54, 'cukup_2' => 56, 'cukup_3' => 58,
                'baik_1' => 60, 'baik_2' => 62, 'baik_3' => 64,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Hormat Kanan',
                'kurang_1' => 47, 'kurang_2' => 49, 'kurang_3' => 51,
                'cukup_1' => 53, 'cukup_2' => 55, 'cukup_3' => 57,
                'baik_1' => 59, 'baik_2' => 61, 'baik_3' => 63,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Tiap-tiap Banjar 2x Belok Kiri',
                'kurang_1' => 48, 'kurang_2' => 50, 'kurang_3' => 52,
                'cukup_1' => 54, 'cukup_2' => 56, 'cukup_3' => 58,
                'baik_1' => 60, 'baik_2' => 62, 'baik_3' => 64,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Ganti Langkah',
                'kurang_1' => 42, 'kurang_2' => 44, 'kurang_3' => 46,
                'cukup_1' => 48, 'cukup_2' => 50, 'cukup_3' => 52,
                'baik_1' => 54, 'baik_2' => 56, 'baik_3' => 58,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Henti Gerak',
                'kurang_1' => 30, 'kurang_2' => 32, 'kurang_3' => 34,
                'cukup_1' => 36, 'cukup_2' => 38, 'cukup_3' => 40,
                'baik_1' => 42, 'baik_2' => 44, 'baik_3' => 46,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Lari',
                'kurang_1' => 42, 'kurang_2' => 44, 'kurang_3' => 46,
                'cukup_1' => 48, 'cukup_2' => 50, 'cukup_3' => 52,
                'baik_1' => 54, 'baik_2' => 56, 'baik_3' => 58,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Langkah Biasa',
                'kurang_1' => 42, 'kurang_2' => 44, 'kurang_3' => 46,
                'cukup_1' => 48, 'cukup_2' => 50, 'cukup_3' => 52,
                'baik_1' => 54, 'baik_2' => 56, 'baik_3' => 58,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Langkah Perlahan',
                'kurang_1' => 44, 'kurang_2' => 46, 'kurang_3' => 48,
                'cukup_1' => 50, 'cukup_2' => 52, 'cukup_3' => 54,
                'baik_1' => 56, 'baik_2' => 58, 'baik_3' => 60,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Lencang Depan',
                'kurang_1' => 32, 'kurang_2' => 34, 'kurang_3' => 36,
                'cukup_1' => 38, 'cukup_2' => 40, 'cukup_3' => 42,
                'baik_1' => 44, 'baik_2' => 46, 'baik_3' => 48,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Buka Barisan',
                'kurang_1' => 38, 'kurang_2' => 40, 'kurang_3' => 42,
                'cukup_1' => 44, 'cukup_2' => 46, 'cukup_3' => 48,
                'baik_1' => 50, 'baik_2' => 52, 'baik_3' => 54,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Tutup Barisan',
                'kurang_1' => 38, 'kurang_2' => 40, 'kurang_3' => 42,
                'cukup_1' => 44, 'cukup_2' => 46, 'cukup_3' => 48,
                'baik_1' => 50, 'baik_2' => 52, 'baik_3' => 54,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Hadap Kiri',
                'kurang_1' => 32, 'kurang_2' => 34, 'kurang_3' => 36,
                'cukup_1' => 38, 'cukup_2' => 40, 'cukup_3' => 42,
                'baik_1' => 44, 'baik_2' => 46, 'baik_3' => 48,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Setengah Lencang Kanan',
                'kurang_1' => 37, 'kurang_2' => 39, 'kurang_3' => 41,
                'cukup_1' => 43, 'cukup_2' => 45, 'cukup_3' => 47,
                'baik_1' => 49, 'baik_2' => 51, 'baik_3' => 53,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Lencang Kanan',
                'kurang_1' => 36, 'kurang_2' => 38, 'kurang_3' => 40,
                'cukup_1' => 42, 'cukup_2' => 44, 'cukup_3' => 46,
                'baik_1' => 48, 'baik_2' => 50, 'baik_3' => 52,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Berhitung',
                'kurang_1' => 34, 'kurang_2' => 36, 'kurang_3' => 38,
                'cukup_1' => 40, 'cukup_2' => 42, 'cukup_3' => 44,
                'baik_1' => 46, 'baik_2' => 48, 'baik_3' => 50,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Hormat',
                'kurang_1' => 35, 'kurang_2' => 37, 'kurang_3' => 39,
                'cukup_1' => 41, 'cukup_2' => 43, 'cukup_3' => 45,
                'baik_1' => 47, 'baik_2' => 49, 'baik_3' => 51,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Hadap Serong Kanan',
                'kurang_1' => 32, 'kurang_2' => 34, 'kurang_3' => 36,
                'cukup_1' => 38, 'cukup_2' => 40, 'cukup_3' => 42,
                'baik_1' => 44, 'baik_2' => 46, 'baik_3' => 48,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Parade Istirahat Ditempat',
                'kurang_1' => 32, 'kurang_2' => 34, 'kurang_3' => 36,
                'cukup_1' => 38, 'cukup_2' => 40, 'cukup_3' => 42,
                'baik_1' => 44, 'baik_2' => 46, 'baik_3' => 48,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Istirahat di Tempat',
                'kurang_1' => 32, 'kurang_2' => 34, 'kurang_3' => 36,
                'cukup_1' => 38, 'cukup_2' => 40, 'cukup_3' => 42,
                'baik_1' => 44, 'baik_2' => 46, 'baik_3' => 48,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Periksa Kerapihan',
                'kurang_1' => 42, 'kurang_2' => 44, 'kurang_3' => 46,
                'cukup_1' => 48, 'cukup_2' => 50, 'cukup_3' => 52,
                'baik_1' => 54, 'baik_2' => 56, 'baik_3' => 58,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Hadap Serong Kiri',
                'kurang_1' => 32, 'kurang_2' => 34, 'kurang_3' => 36,
                'cukup_1' => 38, 'cukup_2' => 40, 'cukup_3' => 42,
                'baik_1' => 44, 'baik_2' => 46, 'baik_3' => 48,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => '4 Langkah ke Kanan',
                'kurang_1' => 34, 'kurang_2' => 36, 'kurang_3' => 38,
                'cukup_1' => 40, 'cukup_2' => 42, 'cukup_3' => 44,
                'baik_1' => 46, 'baik_2' => 48, 'baik_3' => 50,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => '4 Langkah ke Belakang',
                'kurang_1' => 34, 'kurang_2' => 36, 'kurang_3' => 38,
                'cukup_1' => 40, 'cukup_2' => 42, 'cukup_3' => 44,
                'baik_1' => 46, 'baik_2' => 48, 'baik_3' => 50,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => '3 Langkah ke Kiri',
                'kurang_1' => 32, 'kurang_2' => 33, 'kurang_3' => 34,
                'cukup_1' => 35, 'cukup_2' => 36, 'cukup_3' => 37,
                'baik_1' => 38, 'baik_2' => 39, 'baik_3' => 40,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => '2 Langkah ke Depan',
                'kurang_1' => 31, 'kurang_2' => 33, 'kurang_3' => 35,
                'cukup_1' => 37, 'cukup_2' => 39, 'cukup_3' => 41,
                'baik_1' => 43, 'baik_2' => 45, 'baik_3' => 47,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'nama_penilaian' => 'Berkumpul',
                'kurang_1' => 46, 'kurang_2' => 48, 'kurang_3' => 50,
                'cukup_1' => 52, 'cukup_2' => 54, 'cukup_3' => 56,
                'baik_1' => 58, 'baik_2' => 60, 'baik_3' => 62,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
