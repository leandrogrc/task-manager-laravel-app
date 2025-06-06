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
Route::get('/login', [AuthController::class, 'loginPage'])->name('auth.login');
Route::get('/register', [AuthController::class, 'registerPage'])->name('auth.register');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Requests Routes
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('auth.login.submit');
    Route::post('/register', 'store')->name('auth.register.submit');
    Route::post('/logout', 'logout')->name('auth.logout');
});

Route::get('/tasks', [TaskController::class, 'index'])->middleware('auth')->name('tasks');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store')->middleware('auth');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy')->middleware('auth');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update')->middleware('auth');
