<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan ini jika belum ada

    protected $fillable = [
        'catatan',
        'foto',
        'user_id',
        'tanaman_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class);
    }
}