<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistribuidorController;
use App\Http\Controllers\Auth\DistribuidorLoginController;
use App\Http\Controllers\TareaController;


Route::post('/login', [DistribuidorLoginController::class, 'login']);


Route::middleware(['auth:api'])->group(function () {

    Route::prefix('distribuidores')->group(function () {


        Route::get('/', [DistribuidorController::class, 'adminIndex']);
        Route::post('/', [DistribuidorController::class, 'store']);
        Route::delete('/{distribuidor}', [DistribuidorController::class, 'destroy']);
        Route::put('/{distribuidor}', [DistribuidorController::class, 'update']);


    });
    Route::prefix('tareas')->group(function () {


        Route::get('/', [TareaController::class, 'adminIndex']);
        Route::post('/', [TareaController::class, 'store']);
        Route::delete('/{tarea}', [TareaController::class, 'destroy']);
        Route::put('/{tarea}', [TareaController::class, 'update']);


    });

});


// Route::middleware(['auth:api'])->group(function () {

//     Route::put('/{distribuidor}', [DistribuidorController::class, 'update'])->name('distribuidores.update');
//     Route::delete('/{distribuidor}', [DistribuidorController::class, 'destroy'])->name('distribuidores.destroy');
//     Route::post('/', [DistribuidorController::class, 'store'])->name('distribuidores.store');

//     Route::get('/admin/tareas', [TareaApiController::class, 'adminIndex']);
//     Route::put('/{tarea}', [TareaController::class, 'update'])->name('tareas.update');
//     Route::delete('/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');
//     Route::post('/', [TareaController::class, 'store'])->name('tareas.store');

// });
