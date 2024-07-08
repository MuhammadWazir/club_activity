<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('home');
});
Route::get('login', function () {
    return view('auth.login');
})->name('login');
Route::get('register', function () {
    return view('auth.register');
})->name('register.index');
Route::post('register', [UserController::class, 'store'])->name('register.handle');

