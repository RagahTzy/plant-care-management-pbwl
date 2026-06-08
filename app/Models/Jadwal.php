<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    // Tambahkan field yang boleh diisi (mass assignment)
    protected $fillable = [
        'tanaman_id',
        'aktivitas',
        'tanggal',
        'status'
    ];

    // INI DIA SOLUSI ERROR-NYA: Relasi ke Model Tanaman
    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class);
    }
}