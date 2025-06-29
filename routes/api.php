<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PresensiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Middleware\CheckRole;
use App\Http\Middleware\VerifyInternalToken;


Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware(['verify.internal.token'])->group(function () {
    
    //Presensi Routes
    Route::prefix('presensi')->group(function () {
    Route::post('/buka-kelas', [PresensiController::class, 'createPertemuan'])->name('api.presensi.buka_kelas');
    Route::put('/update/{id_presensi_mhs}', [PresensiController::class, 'updatePresensi'])->name('api.presensi.update');
    Route::get('/rekap/{id_presensi_dsn}', [PresensiController::class, 'rekapPresensi'])->name('api.presensi.rekap');
    Route::get('/pertemuan/{id_kelas_mk}', [PresensiController::class, 'daftarPertemuan'])->name('api.presensi.pertemuan');
    Route::get('/daftar-mahasiswa/{id_kelas_mk}', [PresensiController::class, 'daftarPresensiMahasiswa'])->name('api.presensi.daftar_mahasiswa');
    });

    
});
