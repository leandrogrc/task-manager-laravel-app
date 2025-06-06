<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Views Routes
Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginPage')->name('auth.login');
    Route::post('/login', 'login')->name('auth.login.submit');
    Route::get('/register', 'registerPage')->name('auth.register');
    Route::post('/register', 'store')->name('auth.register.submit');
});

// PRIVATE ROUTES //
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Logout
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::controller(TaskController::class)->group(function () {
        Route::get('/tasks', 'index')->name('tasks');
        Route::post('/tasks', 'store')->name('tasks.store');
        Route::put('/tasks/{task}', 'update')->name('tasks.update');
        Route::delete('/tasks/{task}', 'destroy')->name('tasks.destroy');
    });
});
