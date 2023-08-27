<?php

use App\Http\Controllers\DistribuidorController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\Auth\DistribuidorLoginController;

Route::delete('/distribuidores/{distribuidor}', [DistribuidorController::class, 'destroy'])->name('admin.distribuidores.destroy');
