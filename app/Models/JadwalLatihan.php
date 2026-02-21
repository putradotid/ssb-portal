<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalLatihan extends Model
{
    protected $fillable = [
        'ssb_id',
        'tanggal',
        'lokasi'
    ];

    public function ssb()
    {
        return $this->belongsTo(Ssb::class);
    }
}
