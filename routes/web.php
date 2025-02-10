<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/tweets/{tweet}', [TweetController::class, 'show'])->name('tweets.show');
Route::get('/tweets/{tweet}/edit', [TweetController::class, 'edit'])->name('tweets.edit')->middleware('auth');
Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
Route::put('/tweets/{tweet}', [TweetController::class, 'update'])->name('tweets.update')->middleware('auth');
Route::delete('/tweets/{tweet}', [TweetController::class, 'destroy'])->name('tweets.destroy')->middleware('auth');

Route::post('tweets/{tweet}/comments', [CommentController::class, 'store'])->name('tweets.comments.store')->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/terms', function () {
    return view('terms');
});