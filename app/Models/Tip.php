<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    // Pastikan tanaman_id ada di sini agar bisa disimpan
    protected $fillable = ['tanaman_id', 'judul', 'deskripsi'];

    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class);
    }
}