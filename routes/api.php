<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistribuidorController;
use App\Http\Controllers\TareaController;


Route::post('/auth/login', [DistribuidorLoginController::class, 'login'])->name('login.api');

Route::get('/admin/distribuidores', [DistribuidorController::class, 'adminIndex']);

Route::middleware(['auth:api'])->group(function () {

    Route::put('/{distribuidor}', [DistribuidorController::class, 'update'])->name('distribuidores.update');
    Route::delete('/{distribuidor}', [DistribuidorController::class, 'destroy'])->name('distribuidores.destroy');
    Route::post('/', [DistribuidorController::class, 'store'])->name('distribuidores.store');

    Route::get('/admin/tareas', [TareaApiController::class, 'adminIndex']);
    Route::put('/{tarea}', [TareaController::class, 'update'])->name('tareas.update');
    Route::delete('/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');
    Route::post('/', [TareaController::class, 'store'])->name('tareas.store');

});
