<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

Route::get('/eventos', [EventoController::class, 'index']);
Route::post('/eventos', [EventoController::class, 'store']);
Route::get('/eventos/{id}', [EventoController::class, 'show']);
Route::put('/eventos/{id}', [EventoController::class, 'update']);
Route::delete('/eventos/{id}', [EventoController::class, 'destroy']);

// Rutas para Ponentes
use App\Http\Controllers\PonentesController;
Route::get('/ponentes', [PonentesController::class, 'index']);
Route::post('/ponentes', [PonentesController::class, 'store']);
Route::get('/ponentes/{id}', [PonentesController::class, 'show']);
Route::put('/ponentes/{id}', [PonentesController::class, 'update']);
Route::delete('/ponentes/{id}', [PonentesController::class, 'destroy']);    

// Rutas para Asistentes
use App\Http\Controllers\AsistentesController;
Route::get('/asistentes', [AsistentesController::class, 'index']);
Route::post('/asistentes', [AsistentesController::class, 'store']);
Route::get('/asistentes/{id}', [AsistentesController::class, 'show']);
Route::put('/asistentes/{id}', [AsistentesController::class,    'update']);
Route::delete('/asistentes/{id}', [AsistentesController::class, 'destroy']);

