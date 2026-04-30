<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Route Khusus Admin (Dilindungi middleware auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        // Mencegah user biasa masuk ke dashboard admin
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
        
        // Memanggil file view admin yang sudah kita buat sebelumnya
        return view('dashboard.admin'); 
    })->name('admin.dashboard');
    
    // Nanti kamu bisa tambahkan route CRUD Admin lainnya di sini
});

// Route Khusus User Biasa (Dilindungi middleware auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        // Mencegah admin nyasar ke dashboard user
        if (auth()->user()->role !== 'user') {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Karena kamu belum kasih tau view dashboard user-nya apa, 
        // pastikan path ini sesuai dengan file blade dashboard user kamu ya!
        return view('user.index'); 
    })->name('user.dashboard');
    
    // Nanti kamu bisa tambahkan route fitur User lainnya di sini
});

// Route Profile bawaan Breeze (Biarkan saja untuk fitur bawaan, atau modif ke view profil kita nanti)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Wajib ada untuk memanggil route Auth dari Breeze (login, register, dll)
require __DIR__.'/auth.php';