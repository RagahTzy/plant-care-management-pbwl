<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\TipsController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ROUTE AUTHENTICATED UMUM (Admin & User bisa akses)
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tanaman Routes (Shared - Admin untuk kelola, User untuk lihat)
    Route::get('/tanaman', [TanamanController::class, 'index'])->name('tanaman.index');
    Route::get('/tanaman/{tanaman}', [TanamanController::class, 'show'])->name('tanaman.show');

    // Jadwal Routes (Shared - Admin untuk kelola, User untuk lihat)
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/{jadwal}', [JadwalController::class, 'show'])->name('jadwal.show');
    Route::patch('/jadwal/{id}/selesai', [JadwalController::class, 'markAsDone'])->name('jadwal.selesai');

    // Tips Routes (Shared - Admin untuk kelola, User untuk lihat)
    Route::get('/tips', [TipsController::class, 'index'])->name('tips.index');
    Route::get('/tips/{tip}', [TipsController::class, 'show'])->name('tips.show');

    // Laporan Routes (Shared - Admin & User bisa akses, filter logic ada di Controller)
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/{laporan}', [LaporanController::class, 'show'])->name('laporan.show');
    Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::put('/laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
});

// ROUTE KHUSUS ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'adminDashboard'])->name('dashboard');
    
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('lokasi', LokasiController::class)->except(['show']);
});

// Rute Admin dengan prefix nama 'admin.' agar konsisten
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('tanaman', TanamanController::class)->except(['index', 'show']);
    Route::resource('jadwal', JadwalController::class)->except(['index', 'show']);
    Route::resource('tips', TipsController::class)->except(['index', 'show']);
});

// ROUTE KHUSUS USER
// Pastikan kamu punya middleware 'user' atau menggunakan logic manual di Controller
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('dashboard');
    
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
});

require __DIR__.'/auth.php';