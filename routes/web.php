<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/', function () {
});

Auth::routes();


Route::prefix('admin')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm']);
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
});
