<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/sign-up', [SignupController::class, 'index'])->name('register');
Route::post('/sign-up', [SignupController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/edit-profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');
Route::post('/edit-profile', [ProfileController::class, 'store'])->name('profile.store');


Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::post('/{user:username}/posts/{post}', [CommentController::class, 'store'])->name('comments.store');

Route::post('/images', [ImageController::class, 'store'])->name('images.store');

Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');

Route::get('/edit-profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');
Route::post('/edit-profile', [ProfileController::class, 'store'])->name('profile.store');


Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');

