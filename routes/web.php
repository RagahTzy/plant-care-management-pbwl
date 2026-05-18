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
    Route::get('/profile/edit', [ProfileController::class, 'index'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tanaman Routes (Shared - Admin untuk kelola, User untuk lihat)
    Route::get('/tanaman', [TanamanController::class, 'index'])->name('tanaman.index');
    Route::get('/tanaman/{tanaman}', [TanamanController::class, 'show'])->name('tanaman.show');
    Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
    Route::resource('tanaman', TanamanController::class);
    
    // Jadwal Routes (Shared - Admin untuk kelola, User untuk lihat)
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::resource('jadwal', JadwalController::class);
    Route::patch('/jadwal/{id}/selesai', [JadwalController::class, 'markAsDone'])->name('jadwal.selesai');
    
    // Tips Routes (Shared - Admin untuk kelola, User untuk lihat)
    Route::get('/tips', [TipsController::class, 'index'])->name('tips.index');
    Route::get('/tips/{tip}', [TipsController::class, 'show'])->name('tips.show');
    Route::resource('tips', TipsController::class);
});

// ROUTE KHUSUS ADMIN
// Pastikan kamu punya middleware 'admin' atau menggunakan logic manual di Controller
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.admin');
    })->name('dashboard');

    Route::resource('users', UserController::class)->only(['index']);
    
    Route::resource('lokasi', LokasiController::class)->except(['index']);
    Route::resource('tanaman', TanamanController::class)->except(['index', 'show']); // Create, Store, Edit, Update, Destroy
    Route::resource('jadwal', JadwalController::class)->except(['index', 'show']);
    Route::resource('tips', TipsController::class)->except(['index', 'show']);
    
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/{laporan}', [LaporanController::class, 'show'])->name('laporan.show');
});

// ROUTE KHUSUS USER
// Pastikan kamu punya middleware 'user' atau menggunakan logic manual di Controller
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.user');
    })->name('dashboard');

    Route::patch('/jadwal/{jadwal}/selesai', [JadwalController::class, 'markAsDone'])->name('jadwal.selesai'); // Menandai jadwal selesai
    
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
});

require __DIR__.'/auth.php';