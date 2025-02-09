<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
Route::get('/tweets/{tweet}', [TweetController::class, 'show'])->name('tweets.show');
Route::delete('/tweets/{tweet}', [TweetController::class, 'destroy'])->name('tweets.destroy');
Route::get('/tweets/{tweet}/edit', [TweetController::class, 'edit'])->name('tweets.edit');
Route::put('/tweets/{tweet}', [TweetController::class, 'update'])->name('tweets.update');

Route::post('tweets/{tweet}/comments', [CommentController::class, 'store'])->name('tweets.comments.store');

Route::get('/terms', function () {
    return view('terms');
});