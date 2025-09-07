<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NamaJuara extends Model
{
    protected $fillable = ['nama_juara','peringkat'];
    protected $table = 'nama_juara';
}
