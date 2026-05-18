<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tanamans', function (Blueprint $table) {
            $table->dropColumn('lokasi');
            $table->foreignId('lokasi_id')->nullable()->after('spesies')->constrained('lokasis')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('tanamans', function (Blueprint $table) {
            $table->dropForeign(['lokasi_id']);
            $table->dropColumn('lokasi_id');
            $table->string('lokasi')->nullable();
        });
    }
};