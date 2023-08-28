<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistribuidorController;
use App\Http\Controllers\Auth\DistribuidorLoginController;
use App\Http\Controllers\TareaController;


Route::post('/login', [DistribuidorLoginController::class, 'loginApi']);


// Route::middleware(['auth:api'])->group(function () {

    // RUTAS DE DISTRIBUIDORES
    Route::prefix('distribuidores')->group(function () {
        Route::get('/', [DistribuidorController::class, 'adminIndex']);
        Route::post('/', [DistribuidorController::class, 'store']);
        Route::delete('/{distribuidor}', [DistribuidorController::class, 'destroy']);
        Route::put('/{distribuidor}', [DistribuidorController::class, 'update']);
    });

    // RUTAS DE TAREAS
    Route::prefix('tareas')->group(function () {
        Route::get('/', [TareaController::class, 'adminIndex']);
        Route::post('/', [TareaController::class, 'store']);
        Route::delete('/{tarea}', [TareaController::class, 'destroy']);
        Route::put('/{tarea}', [TareaController::class, 'update']);
    });

// });
