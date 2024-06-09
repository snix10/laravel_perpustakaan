<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PinjamBukuController;
use App\Http\Controllers\AuthController;

/*
|----------------------------------------------------------------------------------
*/

// akses

// Route::resource('daftar', DaftarController::class)->middleware('guest');
Route::get('/daftar', [AuthController::class,'lamandaftar'])->middleware('guest');
Route::post('/daftar',[AuthController::class,'daftar']);
Route::get('/masuk', [AuthController::class,'lamanmasuk'])->middleware('guest')->name('masuk');
Route::post('/masuk',[AuthController::class,'masuk']);
Route::post('/keluar',[AuthController::class,'keluar']);


// user
Route::resource('perpustakaan', PerpustakaanController::class);

Route::resource('kategoribuku', kategoriController::class);

Route::get('search', [SearchController::class,'search'])->name('search');

Route::resource('profile', profileController::class)->middleware('auth');

Route::resource('pinjams', PinjamBukuController::class)->middleware('auth');



// admin

Route::resource('dashboard', DashboardController::class)->middleware('auth');

Route::resource('buku', BukuController::class)->middleware('auth');

Route::resource('kategori', KategoriBukuController::class)->middleware('auth');

Route::resource('user', UserController::class)->middleware('auth');

Route::resource('pinjam', PinjamController::class)->middleware('auth');


