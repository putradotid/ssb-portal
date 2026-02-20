<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\JadwalLatihan;
use App\Models\JadwalTurnamen;

class Ssb extends Model
{
    protected $fillable = ['nama', 'alamat'];
    
    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }

    public function jadwalLatihans()
    {
        return $this->hasMany(JadwalLatihan::class);
    }

    public function jadwalTurnamens()
    {
        return $this->hasMany(JadwalTurnamen::class);
    }
}
