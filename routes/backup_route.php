<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasienController;

Route::get('/', function () {
    return view('welcome');
});

// CRUD routes for pasien without using resource

// Index: menampilkan daftar pasien
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');

// Create: menampilkan form tambah pasien
Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');

// Store: menyimpan data pasien baru
Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');

// Show: menampilkan detail pasien
Route::get('/pasien/{pasien}', [PasienController::class, 'show'])->name('pasien.show');

// Edit: menampilkan form edit pasien
Route::get('/pasien/{pasien}/edit', [PasienController::class, 'edit'])->name('pasien.edit');

// Update: memperbarui data pasien
Route::put('/pasien/{pasien}', [PasienController::class, 'update'])->name('pasien.update');

// Destroy: menghapus pasien
Route::delete('/pasien/{pasien}', [PasienController::class, 'destroy'])->name('pasien.destroy');

// Route untuk admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

