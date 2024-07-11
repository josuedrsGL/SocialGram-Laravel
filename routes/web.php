<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/sign-up', [SignupController::class, 'index'])->name('register');
Route::post('/sign-up', [SignupController::class, 'store']);

Route::get('/wall', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);



