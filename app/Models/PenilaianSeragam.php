<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianSeragam extends Model
{
      protected $table = 'penilaian_seragam';

    protected $fillable = [
    'id_aspek',
    'id_peserta',
    'nilai',
        'id_user',

    ];

    public function aspek()
{
    return $this->belongsTo(AspekSeragam::class, 'id_aspek');
}

public function peserta()
{
    return $this->belongsTo(Peserta::class, 'id_peserta');
}
public function penilai()
{
    return $this->belongsTo(User::class, 'id_user');
}
}
