<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenguranganNilai extends Model
{
     protected $table = 'pengurangan_nilai';

    protected $fillable = [
    'id_aspek',
    'id_peserta',
    'id_user',
    ];
    public function aspek()
{
    return $this->belongsTo(AspekPenguranganNilai::class, 'id_aspek');
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
