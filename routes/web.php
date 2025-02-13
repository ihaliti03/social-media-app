<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
/*
Route::group(['prefix'=>'tweets/', 'as' => 'tweets.', 'middleware'=>['auth']], function () {
    Route::get('{tweet}', [TweetController::class, 'show'])->name('show');
    Route::group(['middleware'=>['auth']], function(){
        Route::post('', [TweetController::class, 'store'])->name('store');
        Route::get('{tweet}/edit', [TweetController::class, 'edit'])->name('edit');
        Route::put('{tweet}', [TweetController::class, 'update'])->name('update');
        Route::delete('{tweet}', [TweetController::class, 'destroy'])->name('destroy');    
        Route::post('{tweet}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});
*/
// https://laravel.com/docs/11.x/controllers#actions-handled-by-resource-controllers
// To clean the messy code above, we use the 3 lines below  
Route::resource('tweets', TweetController::class)->except(['index','create', 'show'])->middleware('auth');
Route::resource('tweets', TweetController::class)->only(['show']);
Route::resource('tweets.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users',UserController::class)->only(['show', 'edit', 'update'])->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');


Route::get('/terms', function () {
    return view('terms');
});