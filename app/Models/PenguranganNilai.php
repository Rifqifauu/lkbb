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
    'durasi_penalti',
    'jml_anggota_penalti'
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
    public function getNilaiPenguranganAttribute()
{
    $aspek = $this->aspek;

    if (!$aspek) {
        return 0;
    }

    // Kalau aspek punya pengurangan langsung
    if (!is_null($aspek->pengurangan)) {
        return $aspek->pengurangan;
    }

    // Hitung berdasarkan per durasi / per anggota
    $total = 0;

    if (!is_null($aspek->per_durasi) && $this->durasi_penalti) {
        $total += $aspek->per_durasi * $this->durasi_penalti;
    }

    if (!is_null($aspek->per_anggota) && $this->jml_anggota_penalti) {
        $total += $aspek->per_anggota * $this->jml_anggota_penalti;
    }

    return $total;
}

}
