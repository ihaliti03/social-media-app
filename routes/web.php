<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
Route::get('/tweets/{tweet}', [TweetController::class, 'show'])->name('tweets.show');
Route::delete('/tweets/{tweet}', [TweetController::class, 'destroy'])->name('tweets.destroy');
Route::get('/tweets/{tweet}/edit', [TweetController::class, 'edit'])->name('tweets.edit');
Route::put('/tweets/{tweet}', [TweetController::class, 'update'])->name('tweets.update');

Route::get('/terms', function () {
    return view('terms');
});








/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
*/