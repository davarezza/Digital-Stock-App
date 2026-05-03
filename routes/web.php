<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'home'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.authenticate');

    Route::get('register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.authenticate');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
