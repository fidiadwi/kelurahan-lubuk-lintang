<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\PerangkatController;
use App\Http\Controllers\Admin\GaleriController;

/*
|--------------------------------------------------------------------------
| Halaman Awal
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect('/login');

});

/*
|--------------------------------------------------------------------------
| Login Admin
|--------------------------------------------------------------------------
*/

Route::get(
    '/login',
    [AuthController::class,'loginForm']
)->name('login');

Route::post(
    '/login',
    [AuthController::class,'login']
)->name('login.process');

Route::post(
    '/logout',
    [AuthController::class,'logout']
)->name('logout');

/*
|--------------------------------------------------------------------------
| Area Admin (Wajib Login)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function(){

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/dashboard',
        [DashboardController::class,'index']
    )->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Laporan & Pesan
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/laporan',
        [LaporanController::class,'index']
    )->name('admin.laporan');

    Route::post(
        '/admin/laporan/{id}/balas',
        [LaporanController::class,'balas']
    )->name('admin.laporan.balas');

    Route::get(
        '/admin/laporan/{id}/dibaca',
        [LaporanController::class,'dibaca']
    )->name('admin.laporan.dibaca');

    Route::delete(
        '/admin/laporan/{id}',
        [LaporanController::class,'destroy']
    )->name('admin.laporan.destroy');

    /*
    |--------------------------------------------------------------------------
    | Profil Kelurahan
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/profil',
        [ProfilController::class,'index']
    )->name('admin.profil');

    Route::post(
        '/admin/profil/update',
        [ProfilController::class,'update']
    )->name('admin.profil.update');

        /*
    |--------------------------------------------------------------------------
    | Perangkat Kelurahan
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/perangkat',
        [PerangkatController::class,'index']
    )->name('admin.perangkat');

    Route::post(
        '/admin/perangkat',
        [PerangkatController::class,'store']
    )->name('admin.perangkat.store');

    Route::delete(
        '/admin/perangkat/{id}',
        [PerangkatController::class,'destroy']
    )->name('admin.perangkat.destroy');

    Route::put(
        '/admin/perangkat/{id}',
        [PerangkatController::class,'update']
    )->name('admin.perangkat.update');

    /*
    |--------------------------------------------------------------------------
    | Galeri Dokumentasi
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/galeri',
        [GaleriController::class,'index']
    )->name('admin.galeri');

    Route::post(
        '/admin/galeri',
        [GaleriController::class,'store']
    )->name('admin.galeri.store');

    Route::delete(
        '/admin/galeri/{id}',
        [GaleriController::class,'destroy']
    )->name('admin.galeri.destroy');

    Route::put(
        '/admin/galeri/{id}',
        [GaleriController::class,'update']
    )->name('admin.galeri.update');

});