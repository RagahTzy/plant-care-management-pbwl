<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Ubah 'tanamen' menjadi 'tanamans'
        Schema::create('tanamans', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke user (untuk fitur: tanaman per user)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            
            // Data Tanaman
            $table->string('nama');
            $table->string('spesies')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('foto')->nullable(); // Untuk menyimpan path foto
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Jangan lupa ubah juga yang di sini
        Schema::dropIfExists('tanamans');
    }
};