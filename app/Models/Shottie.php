<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shottie extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'alamat',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'pendaftarans')
            ->withPivot('tanggal_daftar', 'status')
            ->withTimestamps();
    }

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
