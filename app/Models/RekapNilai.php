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
}
