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

    // untuk button ikuti kegiatan ini
    Route::post('/events/{event}/join', [EventController::class, 'join'])
        ->name('events.join');

    // Untuk menyelesaikan event dari relawan
    Route::post('/events/{event}/complete', [EventController::class, 'completeParticipation'])
        ->name('events.complete');

    // Untuk menyelesaikan event dari penyelenggara
    Route::post('/events/{event}/finish', [EventController::class, 'finishEvent'])
        ->name('events.finish');


    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])
        ->middleware('auth')
        ->name('profile.avatar.update');
    Route::delete('/profile/avatar', [ProfileController::class, 'destroyAvatar'])
        ->middleware('auth')
        ->name('profile.avatar.destroy');

});

require __DIR__.'/auth.php';
