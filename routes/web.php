<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PeinadoController;
use Illuminate\Support\Facades\Route;

// Listado
Route::get('peinado', [PeinadoController::class, 'index'])->name('peinado.index');

// Crear
Route::get('peinado/create', [PeinadoController::class, 'create'])->name('peinado.create');
Route::post('peinado', [PeinadoController::class, 'store'])->name('peinado.store');

// Ver
Route::get('peinado/{peinado}', [PeinadoController::class, 'show'])->name('peinado.show');

// Editar
Route::get('peinado/{peinado}/edit', [PeinadoController::class, 'edit'])->name('peinado.edit');
Route::put('peinado/{peinado}', [PeinadoController::class, 'update'])->name('peinado.update');

// Eliminar
Route::delete('peinado/{peinado}', [PeinadoController::class, 'destroy'])->name('peinado.destroy');


// ELIMINA ESTA LÍNEA DUPLICADA:
// Route::get('/peinado', [PeinadoController::class, 'index']);