<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianTataRias extends Model
{
      protected $table = 'penilaian_tata_rias';

    protected $fillable = [
    'id_aspek',
    'id_peserta',
        'id_user',

    'nilai',
    ];
    public function aspek()
{
    return $this->belongsTo(AspekTataRias::class, 'id_aspek');
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
