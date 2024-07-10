<?php

use App\Http\Controllers\PenilaianGuruController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KompetensiAtasanController;
use App\Http\Controllers\KompetensiGuruController;
use App\Http\Controllers\KompetensiSiswaController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PertanyaanAtasanController;
use App\Http\Controllers\PertanyaanGuruController;
use App\Http\Controllers\PertanyaanSiswaController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('ada', function () {
    return view('layouts.backend');
});

Auth::routes();

Route::resource('/penilaian', PenilaianGuruController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('mapel', Mapelcontroller::class);
    Route::resource('guru', Gurucontroller::class);
    Route::resource('kompetensi', KompetensiAtasanController::class);
    Route::resource('kompetensiguru', KompetensiGuruController::class);
    Route::resource('kompetensisiswa', KompetensisiswaController::class);
    Route::resource('pertanyaan', PertanyaanAtasanController::class);
    Route::resource('pertanyaanguru', PertanyaanGuruController::class);
    Route::resource('pertanyaansiswa', PertanyaanSiswaController::class);
    Route::resource('user', UserController::class);
});

