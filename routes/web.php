<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autentikasi (Breeze atau Laravel UI sudah menyediakan route untuk login dan register)
require __DIR__.'/auth.php';

// Route dashboard untuk masing-masing role, dilindungi oleh middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin'); // resources/views/dashboard/admin.blade.php
    })->name('admin.dashboard');

    Route::get('/dashboard/teknisi', function () {
        return view('dashboard.teknisi'); // resources/views/dashboard/teknisi.blade.php
    })->name('teknisi.dashboard');

    Route::get('/dashboard/laboran', function () {
        return view('dashboard.laboran'); // resources/views/dashboard/laboran.blade.php
    })->name('laboran.dashboard');

    Route::get('/dashboard/user', function () {
        return view('dashboard.user'); // resources/views/dashboard/user.blade.php
    })->name('user.dashboard');
});