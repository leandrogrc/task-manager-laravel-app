<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// PUBLIC ROUTES //
Route::middleware('guest')->controller(AuthController::class)->group(function () {

    // Login
    Route::get('/login', 'loginPage')->name('auth.login'); // View
    Route::post('/auth/login', 'login')->name('auth.login.submit'); // Web

    // Register
    Route::get('/register', 'registerPage')->name('auth.register'); // View
    Route::post('/auth/register', 'store')->name('auth.register.submit'); // Web
});

// PRIVATE ROUTES //
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // View

    // Logout
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout'); // Web

    // Tasks
    Route::controller(TaskController::class)->group(function () {
        Route::get('/tasks', 'index')->name('tasks'); // View
        Route::post('/tasks', 'store')->name('tasks.store'); // Web
        Route::put('/tasks/{task}', 'update')->name('tasks.update'); // Web
        Route::delete('/tasks/{task}', 'destroy')->name('tasks.destroy'); // Web
    });
});
