<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;

Route::get('/', function () {
    return redirect('/admin/dashboard');
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get(
    '/admin/dashboard',
    [DashboardController::class, 'index']
)->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| Laporan & Pesan
|--------------------------------------------------------------------------
*/

Route::get(
    '/admin/laporan',
    [LaporanController::class, 'index']
)->name('admin.laporan');

Route::post(
    '/admin/laporan/{id}/balas',
    [LaporanController::class, 'balas']
)->name('admin.laporan.balas');

Route::get(
    '/admin/laporan/{id}/dibaca',
    [LaporanController::class, 'dibaca']
)->name('admin.laporan.dibaca');

Route::delete(
    '/admin/laporan/{id}',
    [LaporanController::class, 'destroy']
)->name('admin.laporan.destroy');