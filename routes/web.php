<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipsController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🔥 HALAMAN AWAL
Route::get('/', function () {
    return redirect()->route('tips.index');
});


// =====================
// ✅ TIPS
// =====================
Route::resource('tips', TipsController::class);


// =====================
// ✅ JADWAL
// =====================
Route::resource('jadwal', JadwalController::class);

// 🔥 TAMBAHAN (WAJIB BUAT TOMBOL ✔)
Route::patch('/jadwal/{id}/selesai', [JadwalController::class, 'selesai'])
    ->name('jadwal.selesai');


// =====================
// ✅ LAPORAN
// =====================
Route::resource('laporan', LaporanController::class)->only([
    'index',
    'show',
    'create',
    'store'
]);