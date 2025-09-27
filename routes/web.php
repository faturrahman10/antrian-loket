<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoketController;
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

Route::middlewate(['auth'])->group(function () {
    Route::get('/loket', [LoketController::class, 'index'])->name('loket.dashboard');
    Route::get('/loket/create', [LoketController::class, 'create'])->name('loket.create');
    Route::post('/loket', [LoketController::class, 'store'])->name('loket.store');
});


require __DIR__ . '/auth.php';
