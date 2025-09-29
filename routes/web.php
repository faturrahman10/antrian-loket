<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoketController;
use App\Http\Controllers\QueueController;
use App\Models\Loket;
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
    Route::get('/queue', [QueueController::class, 'dashboard'])->name('queue.dashboard');
    Route::get('/queue/{loket}', [QueueController::class, 'show'])->name('loket.queue.show');
    Route::post('/queue/{loket}/store', [QueueController::class, 'store'])->name('loket.queue.store');
    Route::post('/queue/{queue}/call', [QueueController::class, 'call'])->name('queue.call');
    Route::post('/queue/{queue}/finish', [QueueController::class, 'finish'])->name('queue.finish');
    Route::post('/queue/{queue}/skip', [QueueController::class, 'skip'])->name('queue.skip');
});


require __DIR__ . '/auth.php';
