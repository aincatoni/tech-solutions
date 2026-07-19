<?php

use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
Route::get('/proyectos/crear', [ProyectoController::class, 'create'])->name('proyectos.create');
Route::post('/proyectos', [ProyectoController::class, 'store'])->name('proyectos.store');
Route::get('/proyectos/{id}', [ProyectoController::class, 'show'])->name('proyectos.show');
Route::get('/proyectos/{id}/editar', [ProyectoController::class, 'edit'])->name('proyectos.edit');
Route::put('/proyectos/{id}', [ProyectoController::class, 'update'])->name('proyectos.update');
Route::delete('/proyectos/{id}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');
