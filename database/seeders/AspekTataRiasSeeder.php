<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AspekTataRiasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('aspek_tata_rias')->insert([
            ['nama_penilaian'=>'Kehalusan foundation & bedak',
             'kurang_1'=>4,'kurang_2'=>6,'kurang_3'=>8,
             'cukup_1'=>10,'cukup_2'=>12,'cukup_3'=>14,
             'baik_1'=>16,'baik_2'=>18,'baik_3'=>20,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['nama_penilaian'=>'Aplikasi bentuk alis / penyesuaian dengan gender',
             'kurang_1'=>5,'kurang_2'=>7,'kurang_3'=>9,
             'cukup_1'=>11,'cukup_2'=>13,'cukup_3'=>15,
             'baik_1'=>17,'baik_2'=>19,'baik_3'=>21,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['nama_penilaian'=>'Aplikasi ketepatan warna blush on',
             'kurang_1'=>3,'kurang_2'=>5,'kurang_3'=>7,
             'cukup_1'=>9,'cukup_2'=>11,'cukup_3'=>13,
             'baik_1'=>15,'baik_2'=>17,'baik_3'=>19,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['nama_penilaian'=>'Aplikasi ketepatan pewarna bibir',
             'kurang_1'=>4,'kurang_2'=>6,'kurang_3'=>8,
             'cukup_1'=>10,'cukup_2'=>12,'cukup_3'=>14,
             'baik_1'=>16,'baik_2'=>18,'baik_3'=>20,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['nama_penilaian'=>'Keselarasan dengan Kostum',
             'kurang_1'=>4,'kurang_2'=>6,'kurang_3'=>8,
             'cukup_1'=>10,'cukup_2'=>12,'cukup_3'=>14,
             'baik_1'=>16,'baik_2'=>18,'baik_3'=>20,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ]);
    }
}
