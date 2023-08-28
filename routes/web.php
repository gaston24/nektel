<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistribuidorController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\Auth\DistribuidorLoginController;

// Rutas de autenticación
Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [DistribuidorLoginController::class, 'login'])->name('login');
});

Route::post('/logout', [DistribuidorLoginController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->group(function () { Route::get('/', function () { return view('auth/login'); })->name('home'); });

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    // RUTAS DE DISTRIBUIDORES
    Route::prefix('distribuidores')->group(function () {
        Route::get('/admin', [DistribuidorController::class, 'adminIndex'])->name('admin.distribuidores.index');
        Route::get('/create', [DistribuidorController::class, 'create'])->name('distribuidores.create');
        Route::get('/{distribuidor}/edit', [DistribuidorController::class, 'edit'])->name('distribuidores.edit');
        Route::put('/{distribuidor}', [DistribuidorController::class, 'update'])->name('distribuidores.update');
        Route::delete('/{distribuidor}', [DistribuidorController::class, 'destroy'])->name('distribuidores.destroy');
        Route::post('/', [DistribuidorController::class, 'store'])->name('distribuidores.store');
    });

    // RUTAS DE TAREAS
    Route::prefix('tareas')->group(function () {
        Route::get('/admin', [TareaController::class, 'adminIndex'])->name('admin.tareas.index');
        Route::get('/create', [TareaController::class, 'create'])->name('tareas.create');
        Route::get('/{tarea}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
        Route::put('/{tarea}', [TareaController::class, 'update'])->name('tareas.update');
        Route::delete('/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');
        Route::post('/', [TareaController::class, 'store'])->name('tareas.store');
    });

});
