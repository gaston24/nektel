<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistribuidorController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\Auth\DistribuidorLoginController;

// Rutas de autenticación
Route::get('/login', [DistribuidorLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [DistribuidorLoginController::class, 'login'])->name('login');
Route::post('/logout', [DistribuidorLoginController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    
    // RUTAS DE DISTRIBUIDORES
    Route::get('/admin/distribuidores', [DistribuidorController::class, 'adminIndex'])->name('admin.distribuidores.index');
    Route::get('/distribuidores/create', [DistribuidorController::class, 'create'])->name('distribuidores.create');
    Route::get('/distribuidores/{distribuidor}/edit', [DistribuidorController::class, 'edit'])->name('distribuidores.edit');
    Route::put('/distribuidores/{distribuidor}', [DistribuidorController::class, 'update'])->name('distribuidores.update');
    Route::delete('/distribuidores/{distribuidor}', [DistribuidorController::class, 'destroy'])->name('distribuidores.destroy');
    Route::post('/distribuidores', [DistribuidorController::class, 'store'])->name('distribuidores.store');
    
    // RUTAS DE TAREAS
    Route::get('/admin/tareas', [TareaController::class, 'adminIndex'])->name('admin.tareas.index');
    Route::get('/tareas/create', [TareaController::class, 'create'])->name('tareas.create');
    Route::get('/tareas/{tarea}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
    Route::put('/tareas/{tareas}', [TareaController::class, 'update'])->name('tareas.update');
    Route::delete('/tareas/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');
    Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');
});

// Ruta de inicio
Route::get('/home', 'HomeController@index')->name('home');
