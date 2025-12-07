<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;


//front
Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Auth::routes();

//admin
Route::prefix('admin')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm']);
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
});
