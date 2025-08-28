<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AspekTataRias extends Model
{
     protected $table = 'aspek_tata_rias';

    protected $fillable = [
        'nama_penilaian',
        'kurang_1',
        'kurang_2',
        'kurang_3',
        'cukup_1',
        'cukup_2',
        'cukup_3',
        'baik_1',
        'baik_2',
        'baik_3',
    ];
}
