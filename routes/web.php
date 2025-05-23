<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterestPlaceController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\OrmControllers;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);

Route::resource('profiles', ProfileController::class);

Route::resource('interestplaces', InterestPlaceController::class);

Route::resource('statistics', StatisticController::class);

Route::resource('announcements', AnnouncementController::class);

Route::get('pruebasomr',[OrmControllers::class,'consultas']);

Route::get('/configurations', [ConfigurationController::class, 'index'])->name('configurations');