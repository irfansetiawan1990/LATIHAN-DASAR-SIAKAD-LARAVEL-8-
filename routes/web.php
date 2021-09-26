<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\KelasController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::resource('guru', GuruController::class);
Route::resource('mapel', MapelController::class);
Route::resource('siswa', SiswaController::class);
Route::get('/siswaexport', [App\Http\Controllers\SiswaController::class, 'siswaexport'])->name('siswaexport');
Route::post('/siswaimport', [App\Http\Controllers\SiswaController::class, 'siswaimport'])->name('siswaimport');
Route::resource('kelas', KelasController::class);
Route::resource('rombel', RombelController::class);


