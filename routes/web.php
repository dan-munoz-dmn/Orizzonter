<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterestPlaceController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\OrmControllers;
Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);

Route::resource('interestplaces', InterestPlaceController::class);



Route::resource('statistics', StatisticController::class);



// ruta para los omr 
Route::get('pruebasomr',[OrmControllers::class,'consultas']);