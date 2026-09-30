<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';

    protected $fillable = [
        'event_id',
        'shottie_id',
        'nama',
        'email',
        'no_hp',
        'alamat',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}