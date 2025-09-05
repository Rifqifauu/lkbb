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
        if (! $this->aspek || $this->nilai === null || $this->nilai === '') {
            return 0;
        }

        // Jika nilai sudah angka → langsung kembalikan
        if (is_numeric($this->nilai)) {
            return (int) $this->nilai;
        }

        // Jika nilai string → mapping ke kolom aspek
        return match ($this->nilai) {
            'kurang_1' => $this->aspek->kurang_1 ?? 0,
            'kurang_2' => $this->aspek->kurang_2 ?? 0,
            'kurang_3' => $this->aspek->kurang_3 ?? 0,
            'cukup_1'  => $this->aspek->cukup_1  ?? 0,
            'cukup_2'  => $this->aspek->cukup_2  ?? 0,
            'cukup_3'  => $this->aspek->cukup_3  ?? 0,
            'baik_1'   => $this->aspek->baik_1   ?? 0,
            'baik_2'   => $this->aspek->baik_2   ?? 0,
            'baik_3'   => $this->aspek->baik_3   ?? 0,
            default    => 0,
        };
    }
}
