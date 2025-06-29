<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/login');

Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('superadmin')->group(function () {
    Route::get('/registrasi', [RegisterController::class, 'showRegistrationForm']);
    Route::post('/registrasi', [RegisterController::class, 'register'])->name('superadmin.registrasi');
    
});

















route::prefix('prodi')->group(function () {
Route::get('/', function () {
    return view('prodi.index');
});

Route::get('/nilai', function () {
    return view('prodi.nilai');
});

Route::get('/kurikulum', function () {
    return view('prodi.kurikulum');
});

Route::get('/matkul', function () {
    return view('prodi.matakuliah');
});

Route::get('/dosen', function () {
    return view('prodi.dosen');
});

Route::get('/presensi-mahasiswa', function () {
    return view('prodi.presensimhs');
});

Route::get('/detail-mahasiswa', function () {
    return view('prodi.detailmahasiswa');
});

Route::get('/presensi-dosen', function () {
    return view('prodi.presensidosen');
});

Route::get('/detail-kurikulum', function () {
    return view('prodi.detailkurikulum');
});
});


route::prefix('akademik')->group(function () {
    Route::get('/dashboard', function () {
        return view('akademik.dashboard');
    });

    Route::get('/manajemenkelas', function () {
        return view('akademik.manajemen');
    });

    Route::get('/akademik', function () {
        return view('akademik.akademik');
    });

    Route::get('/mahasiswa', function () {
        return view('akademik.mahasiswa');
    });

    Route::get('/detail', function () {
        return view('akademik.detail');
    });
});
