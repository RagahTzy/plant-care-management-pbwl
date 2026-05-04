<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    // biar bisa insert data dari controller
    protected $fillable = [
        'tanaman_id',
        'judul',
        'deskripsi',
    ];

    // relasi ke tanaman
    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class);
    }
}