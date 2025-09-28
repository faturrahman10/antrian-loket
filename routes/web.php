<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoketController;
use App\Http\Controllers\QueueController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/loket', [LoketController::class, 'index'])->name('loket.dashboard');
    Route::get('/loket/create', [LoketController::class, 'create'])->name('loket.create');
    Route::post('/loket', [LoketController::class, 'store'])->name('loket.store');
    Route::get('/loket/{loket}', [LoketController::class, 'show'])->name('loket.show');
    Route::get('/loket/{loket}/edit', [LoketController::class, 'edit'])->name('loket.edit');
    Route::put('/loket/{loket}', [LoketController::class, 'update'])->name('loket.update');
    Route::delete('/loket/{loket}', [LoketController::class, 'destroy'])->name('loket.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/loket', [QueueController::class, 'index'])->name('loket.index');
});


require __DIR__ . '/auth.php';
