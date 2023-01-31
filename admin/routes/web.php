<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

// Auth::routes();


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('berita', BeritaController::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('struktur', StrukturController::class);
    Route::resource('kahutla', KahutlaController::class);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');