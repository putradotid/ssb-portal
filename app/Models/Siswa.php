<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'ssb_id',
        'nama',
        'umur',
        'posisi',
        'foto',
        'status_aktif'
    ];

    public function ssb()
    {
        return $this->belongsTo(Ssb::class);
    }
}
