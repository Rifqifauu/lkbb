<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AspekSeragamSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('aspek_seragam')->insert([
            ['nama_penilaian'=>'Ciri Khas Desain',
             'kurang_1'=>7,'kurang_2'=>9,'kurang_3'=>11,
             'cukup_1'=>13,'cukup_2'=>15,'cukup_3'=>17,
             'baik_1'=>19,'baik_2'=>21,'baik_3'=>23,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['nama_penilaian'=>'Penutup Kepala',
             'kurang_1'=>1,'kurang_2'=>3,'kurang_3'=>5,
             'cukup_1'=>7,'cukup_2'=>9,'cukup_3'=>11,
             'baik_1'=>13,'baik_2'=>15,'baik_3'=>17,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['nama_penilaian'=>'Etika Kesopanan',
             'kurang_1'=>5,'kurang_2'=>7,'kurang_3'=>9,
             'cukup_1'=>11,'cukup_2'=>13,'cukup_3'=>15,
             'baik_1'=>17,'baik_2'=>19,'baik_3'=>21,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['nama_penilaian'=>'Body Fitting',
             'kurang_1'=>3,'kurang_2'=>5,'kurang_3'=>7,
             'cukup_1'=>9,'cukup_2'=>11,'cukup_3'=>13,
             'baik_1'=>15,'baik_2'=>17,'baik_3'=>19,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['nama_penilaian'=>'Keselarasan Warna dan Konsep',
             'kurang_1'=>6,'kurang_2'=>8,'kurang_3'=>10,
             'cukup_1'=>12,'cukup_2'=>14,'cukup_3'=>16,
             'baik_1'=>18,'baik_2'=>20,'baik_3'=>22,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['nama_penilaian'=>'Kerapihan & Kebersihan Pemakaian',
             'kurang_1'=>3,'kurang_2'=>5,'kurang_3'=>7,
             'cukup_1'=>9,'cukup_2'=>11,'cukup_3'=>13,
             'baik_1'=>15,'baik_2'=>17,'baik_3'=>19,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['nama_penilaian'=>'Kharisma Keseluruhan Kostum',
             'kurang_1'=>7,'kurang_2'=>9,'kurang_3'=>11,
             'cukup_1'=>13,'cukup_2'=>15,'cukup_3'=>17,
             'baik_1'=>19,'baik_2'=>21,'baik_3'=>23,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['nama_penilaian'=>'Kesesuaian Kostum dengan Vafor',
             'kurang_1'=>4,'kurang_2'=>6,'kurang_3'=>8,
             'cukup_1'=>10,'cukup_2'=>12,'cukup_3'=>14,
             'baik_1'=>16,'baik_2'=>18,'baik_3'=>20,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['nama_penilaian'=>'Kerapihan Alas kaki (sepatu)',
             'kurang_1'=>2,'kurang_2'=>4,'kurang_3'=>6,
             'cukup_1'=>8,'cukup_2'=>10,'cukup_3'=>12,
             'baik_1'=>14,'baik_2'=>16,'baik_3'=>18,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['nama_penilaian'=>'Kekuatan Kostum',
             'kurang_1'=>2,'kurang_2'=>4,'kurang_3'=>6,
             'cukup_1'=>8,'cukup_2'=>10,'cukup_3'=>12,
             'baik_1'=>14,'baik_2'=>16,'baik_3'=>18,
             'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ]);
    }
}
