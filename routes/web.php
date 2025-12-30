<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard (list kegiatan)
    Route::get('/dashboard', [EventController::class, 'index'])
        ->name('dashboard');

    // Event resource (create, store, show, edit, update, destroy)
    Route::resource('events', EventController::class)
        ->except(['index']);

    // Route index kegiatan dibuat secara manual.
    // Hal ini karena events.index dikecualikan dari Route::resource
    // agar halaman dashboard dan daftar kegiatan bisa memakai logic controller yang sama.
    Route::get('/events', [EventController::class, 'index'])
        ->name('events.index');

    // Kelola event (custom)
    Route::get('/events/{event}/manage', [EventController::class, 'manage'])
        ->name('events.manage');

    // Aktivitas saya
    Route::get('/myactivities', [EventController::class, 'myActivities'])
        ->name('myactivities');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
