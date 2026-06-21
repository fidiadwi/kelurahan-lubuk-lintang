<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return redirect('/admin/dashboard');
});


Route::get('/admin/dashboard', [DashboardController::class, 'index']);