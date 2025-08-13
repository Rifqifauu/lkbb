<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianDanton extends Model
{
     protected $table = 'penilaian_danton';

    protected $fillable = [
    'id_aspek',
    'id_peserta',
    'id_user',
    'nilai',
    ];
    public function aspek()
{
    return $this->belongsTo(AspekDanton::class, 'id_aspek');
}

public function peserta()
{
    return $this->belongsTo(Peserta::class, 'id_peserta');
}
public function penilai()
{
    return $this->belongsTo(User::class, 'id_user');
}

  public function getNilaiNumerik()
    {
        if (!$this->aspek || !$this->nilai) {
            return 0;
        }

        return $this->aspek->{$this->nilai} ?? 0;
    }
}
