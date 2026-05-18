<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    use HasFactory;

    // Kunci nama tabel di sini!
    protected $table = 'tanamans';

    protected $fillable = [
        'nama',
        'spesies',
        'lokasi_id',
        'user_id',
        'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}