<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DistribuidorApiController;
use App\Http\Controllers\API\TareaApiController;


Route::post('/auth/login', [DistribuidorLoginController::class, 'login'])->name('login.api');


Route::middleware(['auth:api'])->group(function () {

    Route::get('/api/admin/distribuidores', [DistribuidorApiController::class, 'adminIndex'])->name('admin.distribuidores.index.api');

    Route::get('/api/admin/tareas', [TareaApiController::class, 'adminIndex'])->name('admin.tareas.index.api');

});
