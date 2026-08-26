<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'shottie_id',
        'event_id',
        'tanggal_daftar',
        'status',
    ];

    public function shottie()
    {
        return $this->belongsTo(Shottie::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
