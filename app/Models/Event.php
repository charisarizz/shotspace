<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'nama_event',
        'deskripsi',
        'tanggal',
        'lokasi',
        'kuota',
    ];

    public function shotties()
    {
        return $this->belongsToMany(Shottie::class, 'pendaftarans')
            ->withPivot('tanggal_daftar', 'status')
            ->withTimestamps();
    }

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
