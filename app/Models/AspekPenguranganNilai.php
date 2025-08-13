<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AspekPenguranganNilai extends Model
{
    protected $table = 'aspek_pengurangan_nilai';

    protected $fillable = [
        'nama_penilaian',
        'pengurangan',
    ];
}
