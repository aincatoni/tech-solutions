<?php

use App\Http\Controllers\ProyectoApiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('proyectos', ProyectoApiController::class);
