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
        'jml_anggota_penalti',
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

    // Kalau masih dipakai di tempat lain
    public function getNilaiNumerik()
    {
        if (!$this->aspek || !$this->nilai) {
            return 0;
        }

        return $this->aspek->{$this->nilai} ?? 0;
    }

    // ✅ Nilai pengurangan dinamis
    public function getNilaiPenguranganAttribute()
    {
        $aspek = $this->aspek;

        if (!$aspek) {
            return 0;
        }

        // ✅ Jika aspek punya pengurangan langsung (misalnya -20 per detik/menit)
        if (!is_null($aspek->pengurangan) && $this->durasi_penalti) {
            return $aspek->pengurangan * (int) $this->durasi_penalti;
        }

        // ✅ Jika aspek dihitung per durasi
        if (!is_null($aspek->per_durasi) && $this->durasi_penalti) {
            return $aspek->per_durasi * (int) $this->durasi_penalti;
        }

        // ✅ Jika aspek dihitung per anggota
        if (!is_null($aspek->per_anggota) && $this->jml_anggota_penalti) {
            return $aspek->per_anggota * (int) $this->jml_anggota_penalti;
        }

        return 0;
    }
}
