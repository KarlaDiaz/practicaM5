<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PonentesController;
use App\Http\Controllers\AsistentesController;


Route::get('/eventos', [EventoController::class, 'index']); // Recuperar todos los eventos
Route::get('/eventos/{id}', [EventoController::class, 'show']); //Recuperar un evento específico
Route::get('/ponentes', [PonentesController::class, 'index']);
Route::get('/ponentes/{id}', [PonentesController::class, 'show']);
Route::get('/asistentes', [AsistentesController::class, 'index']);
Route::get('/asistentes/{id}', [AsistentesController::class, 'show']);

/**
* Rutas privadas
*/
Route::middleware('auth:api')->group(function () {
    Route::post('/eventos', [EventoController::class, 'store']);
    Route::put('/eventos/{id}', [EventoController::class, 'update']);
    Route::delete('/eventos/{id}', [EventoController::class, 'destroy']);

    Route::post('/ponentes', [PonentesController::class, 'store']);
    Route::put('/ponentes/{id}', [PonentesController::class, 'update']);
    Route::delete('/ponentes/{id}', [PonentesController::class, 'destroy']);

    Route::post('/asistentes', [AsistentesController::class, 'store']);
    Route::put('/asistentes/{id}', [AsistentesController::class, 'update']);
    Route::delete('/asistentes/{id}', [AsistentesController::class, 'destroy']);
});

