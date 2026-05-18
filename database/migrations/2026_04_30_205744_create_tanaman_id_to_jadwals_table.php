<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jadwals', function (Blueprint $table) {
            // Menambahkan kolom tanaman_id yang merujuk ke tabel tanamans
            // Kita buat nullable() dulu untuk berjaga-jaga jika di tabel jadwals kamu sudah ada data lama yang nyangkut
            $table->foreignId('tanaman_id')->nullable()->constrained('tanamans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->dropForeign(['tanaman_id']);
            $table->dropColumn('tanaman_id');
        });
    }
};