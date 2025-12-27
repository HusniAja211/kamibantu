<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//1. Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 2. Buat Kegiatan
Route::get('/events/create', function () {
    return view('events.create');
})->name('events.create');

// 3. Detail Kegiatan
Route::get('/events/detail', function () {
    return view('events.show');
})->name('events.show');

// 4. Edit Kegiatan
Route::get('/events/edit', function () {
    return view('events.edit');
})->name('events.edit');

// 5. Kelola Kegiatan (Manage)
Route::get('/events/manage', function () {
    return view('events.manage');
})->name('events.manage');

// 6. Kegiatanku (Daftar kegiatan yang diikuti/dibuat user)
Route::get('/myactivities', function () {
    return view('myActivities');
})->name('myactivities');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
