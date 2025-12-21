<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MeditationController;
use App\Http\Controllers\AuthController;



//front
Route::get('/', [PageController::class, 'index']);
Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/guruji-kshetrams', [PageController::class, 'gurujiKshetrams']);
Route::get('/dhyasa', [PageController::class, 'dhyasa']);
//login && register
Route::post('post-login', [AuthController::class, 'postLogin'])->name('custom_login.post'); 
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('custom_register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('custom_logout');



Auth::routes();

//admin
Route::prefix('admin')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm']);
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('meditation', MeditationController::class);

});
});
