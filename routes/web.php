<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// group admin
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->group(function () {
    // route dashboard admin.
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// group petugas
Route::middleware(['auth', 'verified', 'petugas'])->prefix('petugas')->group(function () {
    // route dashboard petugas.
    Route::get('/dashboard', function () {
        return view('petugas.dashboard');
    })->name('dashboard.petugas');
});

// group petugas
Route::middleware(['auth', 'verified'])->prefix('user')->group(function () {
    // route dashboard petugas.
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard.user');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
