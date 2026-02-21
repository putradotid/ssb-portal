<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalTurnamen extends Model
{
    protected $fillable = [
        'ssb_id',
        'nama_turnamen',
        'tanggal',
        'lokasi'
    ];

    public function ssb()
    {
        return $this->belongsTo(Ssb::class);
    }
}
