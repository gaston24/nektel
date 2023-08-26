<?php

use App\Http\Controllers\DistribuidorController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\Auth\DistribuidorLoginController;

Route::resource('distribuidores', DistribuidorController::class);
Route::resource('tareas', TareaController::class);


Route::get('/login', [DistribuidorLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [DistribuidorLoginController::class, 'login'])->name('login');
Route::post('/logout', [DistribuidorLoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
