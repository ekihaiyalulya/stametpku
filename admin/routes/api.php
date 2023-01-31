<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('berita', \API\BeritaController::class);
Route::post('/berita/update/{id}',[App\Http\Controllers\API\BeritaController::class, 'update'])->name('update');

Route::resource('pegawai', \API\PegawaiController::class);
Route::post('/pegawai/update/{id}',[App\Http\Controllers\API\PegawaiController::class, 'update'])->name('update');

Route::resource('struktur', \API\StrukturController::class);
Route::post('/struktur/update/{id}',[App\Http\Controllers\API\StrukturController::class, 'update'])->name('update');

Route::resource('kahutla', \API\KahutlaController::class);
Route::post('/kahutla/update/{id}',[App\Http\Controllers\API\KahutlaController::class, 'update'])->name('update');
