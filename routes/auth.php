<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// Route::middleware('guest')->group(function () {
Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('registro', [RegisteredUserController::class, 'store'])
    ->name('registro');

// Login
Route::get('login', [LoginController::class, 'create'])
    ->name('login');

Route::post('entrar', [LoginController::class, 'auth'])->name('entrar');


Route::post('logout', [LoginController::class, 'destroy'])
    ->name('logout');


// Route::post('register', [RegisteredUserController::class, 'store']);

// Route::get('login', [AuthenticatedSessionController::class, 'create'])
//             ->name('login');

// Route::post('login', [AuthenticatedSessionController::class, 'store']);

// });

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('logout');
});
