<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AspekVariasiFormasi extends Model
{
     protected $table = 'aspek_variasi_formasi';

    protected $fillable = [
        'nama_penilaian',
        'kurang_1',
        'kurang_2',
        'cukup_1',
        'cukup_2',
        'baik_1',
        'baik_2',
    ];
}
