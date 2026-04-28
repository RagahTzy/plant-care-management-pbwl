<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard.user'); 
})->name('dashboard');

Route::get('/tanaman', function () {
    return view('tanaman.index'); 
})->name('tanaman.index');

Route::get('/tanaman/{id}', function ($id) {
    return view('tanaman.show', ['id' => $id]); 
})->name('tanaman.show');

Route::get('/laporan', function () {
    return view('laporan.index');
})->name('laporan.index');

Route::get('/schedule', function () {
    return view('schedule.index'); 
})->name('schedule.index');

Route::get('/login', function () {
    return "Halaman Login Sementara";
})->name('login');

Route::get('/register', function () {
    return "Halaman Register Sementara";
})->name('register');