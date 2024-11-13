<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// Guest Route
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::post('/post-login', [AuthController::class, 'login']);
});

// Admin Route
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', function () {
        return view('pages.admin.index');
    })->name('admin.dashboard');

    Route::get('/admin-logout', [AuthController::class, 'admin_logout'])->name('admin.logout');
});

// User Route
Route::middleware(['web'])->group(function () {
    Route::get('/user', function () {
        return view('pages.user.index');
    })->name('user.dashboard');

    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');
});
