<?php

use App\Http\Controllers\DistribuidorController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\Auth\DistribuidorLoginController;


Route::get('/login', [DistribuidorLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [DistribuidorLoginController::class, 'login'])->name('login');
Route::post('/logout', [DistribuidorLoginController::class, 'logout'])->name('logout');


Route::middleware(['jwt.auth'])->group(function () {
    
    // RUTAS DE DISTRIBUIDORES
    // Route::resource('distribuidores', DistribuidorController::class);
    
    Route::get('/admin/distribuidores', [DistribuidorController::class, 'adminIndex'])->name('admin.distribuidores.index');
    
    Route::get('/distribuidores/create', [DistribuidorController::class, 'create'])->name('distribuidores.create');
    Route::get('/distribuidores/{distribuidor}/edit', [DistribuidorController::class, 'edit'])->name('distribuidores.edit');
    

    Route::put('/distribuidores/{distribuidor}', [DistribuidorController::class, 'update'])->name('distribuidores.update');
    
    Route::post('/distribuidores', [DistribuidorController::class, 'store'])->name('distribuidores.store');
    Route::delete('/distribuidores/{distribuidor}', [DistribuidorController::class, 'destroy'])->name('distribuidores.destroy');
    

    // RUTAS DE TAREAS 
        // Route::resource('tareas', TareaController::class);
        Route::get('/admin/tareas', [TareaController::class, 'adminIndex'])->name('admin.tareas.index');

        Route::get('/tareas/create', [TareaController::class, 'create'])->name('tareas.create');
        Route::get('/tareas/{distribuidor}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
        Route::delete('/tareas/{distribuidor}', [DistribuidorController::class, 'destroy'])->name('tareas.destroy');
        Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');

        
});

Route::get('/home', 'HomeController@index')->name('home');

