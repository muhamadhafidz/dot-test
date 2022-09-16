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
    return view('welcome');
})->name('home');

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/berita-acara', [App\Http\Controllers\BeritaAcaraController::class, 'index'])->name('berita-acara');
        Route::get('/berita-acara/create', [App\Http\Controllers\BeritaAcaraController::class, 'create'])->name('berita-acara.create');
        Route::get('/berita-acara/edit/{id}', [App\Http\Controllers\BeritaAcaraController::class, 'edit'])->name('berita-acara.edit');
        Route::post('/berita-acara', [App\Http\Controllers\BeritaAcaraController::class, 'store'])->name('berita-acara.store');
        Route::put('/berita-acara/{id}', [App\Http\Controllers\BeritaAcaraController::class, 'update'])->name('berita-acara.update');
        Route::delete('/berita-acara/{id}', [App\Http\Controllers\BeritaAcaraController::class, 'destroy'])->name('berita-acara.destroy');

        Route::get('/asisten', [App\Http\Controllers\AsistenController::class, 'index'])->name('asisten');
        Route::get('/asisten/create', [App\Http\Controllers\AsistenController::class, 'create'])->name('asisten.create');
        Route::get('/asisten/edit/{id}', [App\Http\Controllers\AsistenController::class, 'edit'])->name('asisten.edit');
        Route::post('/asisten', [App\Http\Controllers\AsistenController::class, 'store'])->name('asisten.store');
        Route::put('/asisten/{id}', [App\Http\Controllers\AsistenController::class, 'update'])->name('asisten.update');
        Route::delete('/asisten/{id}', [App\Http\Controllers\AsistenController::class, 'destroy'])->name('asisten.destroy');
    });

    Route::get('/presensi', [App\Http\Controllers\PresensiController::class, 'index'])->name('presensi');
    Route::get('/presensi/create/{id}', [App\Http\Controllers\PresensiController::class, 'create'])->name('presensi.create');
    Route::post('/presensi/{id}', [App\Http\Controllers\PresensiController::class, 'store'])->name('presensi.store');
});