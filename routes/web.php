<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;

Route::get('/', function () {
    return redirect('/admin/dashboard');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index']);

Route::get('/admin/laporan', [LaporanController::class, 'index'])
    ->name('admin.laporan');