<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// group admin
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->group(function () {
    // route dashboard admin.
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');


    // petugas
    Route::resource('user', UserController::class);

});

// group petugas
Route::middleware(['auth', 'verified', 'petugas'])->prefix('petugas')->group(function () {
    // route dashboard petugas.
    Route::get('/dashboard', [PetugasController::class, 'dashboard'])->name('dashboard.petugas');

    Route::get('laporan', [PetugasController::class, 'index'])->name('petugas.laporan.index');
    Route::get('laporan/{param}', [PetugasController::class, 'show'])->name('petugas.laporan.show');
    Route::post('laporan/{param}', [PetugasController::class, 'store'])->name('petugas.laporan.post');




});

// group user
Route::middleware(['auth', 'verified'])->prefix('user')->group(function () {
    // route dashboard petugas.
    Route::get('/dashboard', [LaporanController::class, 'dashboard'])->name('dashboard.user');

    Route::get('laporan-saya', [LaporanController::class, 'index'])->name('laporan-saya.index');
    Route::get('buat-laporan', [LaporanController::class, 'create'])->name('laporan-saya.create');
    Route::post('lapor', [LaporanController::class, 'store'])->name('laporan.store');

    Route::get('laporan/{param}', [LaporanController::class, 'show'])->name('laporan.show');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
