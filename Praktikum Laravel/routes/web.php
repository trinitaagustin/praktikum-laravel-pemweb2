<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('welcome');
});


route::get('/about', function () {
    return view(
        'about',
        [
            'nama' => "Ahmad Syauqi Raihan",
            'umur' => 19,
            'prodi' => "Sistem Informasi"
        ]
    );
});

route::get('/salam', function () {
    return "Assalamu'alaikum";
});

route::get('/salam/{nama}', function ($name) {
    return "Assalamu'alaikum $name";
});

Route::get('/produk', [ProdukController::class, 'show']);

Route::get('/prodi', [ProdiController::class, 'show'])->name('prodi.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
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

});

// Route untuk admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


require __DIR__.'/auth.php';
