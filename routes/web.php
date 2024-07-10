<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuideController;
use App\Models\Event;

//PUBLIC ROUTES
Route::get('/', function () {return view('home');})->name('welcome');
Route::get('login', [LoginUserController::class, 'login'])->name('login.index');
Route::post('login', [LoginUserController::class,'store'])->name('login.handle');
Route::get('register', [UserController::class, 'register'])->name('register.index');
Route::post('register', [UserController::class, 'store'])->name('register.handle');
Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::get('home', function () {$events = Event::all(); return view('public.home', ['events'=>$events]);})->name('public.home');
Route::get('/events/{event}', [EventController::class, 'show'])->name('event.show');
Route::get('/events/join/{event}', [EventController::class, 'join'])->name('event.join');
Route::get('/events/leave/{event}', [EventController::class, 'leave'])->name('event.leave');
Route::get('/logout',[LoginUserController::class, 'logout'])->name('logout');
Route::get('/public/viewguides',[GuideController::class, 'indexForPublic'])->name('guides.view');

//GUIDE ROUTES
Route::post('guide/login', [LoginUserController::class,'storeGuide'])->name('guide.login.handle');
Route::get('guide/login', [LoginUserController::class, 'loginGuide'])->name('guide.login.index');
Route::get('guide/events/{guide}', [GuideController::class, 'guideEvents'])->name('guide.events');
Route::get('guide/events/guide/{guide}', [GuideController::class, 'allEvents'])->name('guide.events.all');
Route::get('guide/profile/edit/{guide}', [GuideController::class, 'edit'])->name('guide.profile.edit');
Route::post('guide/profile/update/{guide}', [GuideController::class, 'update'])->name('guide.profile.update');

//ADMIN ROUTES
Route::get('admin/events/', [EventController::class, 'adminEvents'])->name('admin.events');
Route::get('admin/event/add', [EventController::class, 'create'])->name('admin.event.add');
Route::post('admin/event/store', [EventController::class, 'store'])->name('admin.event.store');
Route::get('admin/event/show/{event}', [EventController::class, 'showAdmin'])->name('admin.show.event');
Route::get('admin/event/delete/{event}', [EventController::class, 'destroy'])->name('admin.event.delete');
Route::get('admin/event/edit/{event}', [EventController::class, 'edit'])->name('admin.event.edit');
Route::post('admin/event/update/{event}', [EventController::class, 'update'])->name('admin.event.update');