<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';
    protected $fillable = [
        'nama',
        'no_tampil',
        'tingkat',

    ];
    public function penilaianPBB()
{
    return $this->hasMany(PenilaianPBB::class, 'id_peserta');
}
    public function penilaianDanton()
{
    return $this->hasMany(PenilaianDanton::class, 'id_peserta');
}
    public function penilaianSeragam()
{
    return $this->hasMany(PenilaianSeragam::class, 'id_peserta');
}
    public function penilaianVariasiFormasi()
{
    return $this->hasMany(PenilaianVariasiFormasi::class, 'id_peserta');
}
    public function penilaianTataRias()
{
    return $this->hasMany(PenilaianTataRias::class, 'id_peserta');
}
}
