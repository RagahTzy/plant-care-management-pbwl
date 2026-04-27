<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('welcome');
Route::get('/dashboard', fn() => view('dashboard.user'))->name('dashboard');
Route::get('/tanaman', fn() => view('tanaman.index'))->name('tanaman.index');
Route::get('/tanaman/{id}', fn() => view('tanaman.show'))->name('tanaman.show');
Route::get('/laporan', fn() => view('laporan.index'))->name('laporan.index');