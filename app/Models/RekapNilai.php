<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapNilai extends Model
{
    protected $table = 'rekap_nilai'; // Ensure the table name is correct

    protected $fillable = [
        'id_peserta',
        'nilai_pbb',
        'nilai_danton',
        'nilai_kostum',
        'nilai_tata_rias',
        'nilai_variasi_formasi',
        'nilai_pengurangan',
        'waktu',
        'total_utama',
        'total_umum',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta');
    }
    public function penilaianPbb()
{
    return $this->hasMany(PenilaianPBB::class, 'id_peserta', 'id_peserta');
}

public function penilaianDanton()
{
    return $this->hasMany(PenilaianDanton::class, 'id_peserta', 'id_peserta');
}

public function penilaianSeragam()
{
    return $this->hasMany(PenilaianSeragam::class, 'id_peserta', 'id_peserta');
}

public function penilaianTataRias()
{
    return $this->hasMany(PenilaianTataRias::class, 'id_peserta', 'id_peserta');
}

public function penilaianVariasiFormasi()
{
    return $this->hasMany(PenilaianVariasiFormasi::class, 'id_peserta', 'id_peserta');
}

}