<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SsbController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalLatihanController;
use App\Http\Controllers\JadwalTurnamenController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('ssb', SsbController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('jadwal-latihan', JadwalLatihanController::class);
    Route::resource('jadwal-turnamen', JadwalTurnamenController::class);

    Route::get('/ssb/{ssb}/export-pdf', [SsbController::class, 'exportPdf'])
    ->middleware('auth')
    ->name('ssb.export');
});

require __DIR__.'/auth.php';
