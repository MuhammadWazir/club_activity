<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuideController;
use App\Models\Event;
Route::get('/', function () {
    return view('home');
})->name('welcome');
Route::get('login', [LoginUserController::class, 'login'])->name('login.index');
Route::get('guide/login', [LoginUserController::class, 'loginGuide'])->name('guide.login.index');
Route::get('guide/events/{guide}', [GuideController::class, 'guideEvents'])->name('guide.events');
Route::get('guide/events/guide/{guide}', [GuideController::class, 'allEvents'])->name('guide.events.all');
Route::post('login', [LoginUserController::class,'store'])->name('login.handle');
Route::post('guide/login', [LoginUserController::class,'storeGuide'])->name('guide.login.handle');
Route::get('register', [UserController::class, 'register'])->name('register.index');
Route::post('register', [UserController::class, 'store'])->name('register.handle');
Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::get('home', function () {
    $events = Event::all();
    return view('public.home', ['events'=>$events]);
})->name('public.home');
Route::get('/events/{event}', [EventController::class, 'show'])->name('event.show');
Route::get('/events/join/{event}', [EventController::class, 'join'])->name('event.join');
Route::get('/events/leave/{event}', [EventController::class, 'leave'])->name('event.leave');
Route::get('/logout',[LoginUserController::class, 'logout'])->name('logout');
Route::get('/public/viewguides',[GuideController::class, 'indexForPublic'])->name('guides.view');


