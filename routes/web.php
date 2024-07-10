<?php

use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/sign-up', [SignupController::class, 'index']);

