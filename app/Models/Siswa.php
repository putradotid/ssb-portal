<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public function ssb()
    {
        return $this->belongsTo(Ssb::class);
    }
}
