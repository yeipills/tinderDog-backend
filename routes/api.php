<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\InteraccionController;

  
Route::get('/perros/random', [PerroController::class, 'random']);

Route::post('/perros/{perro}/interacciones', [InteraccionController::class, 'store']);

Route::get('/perros/candidatos', [PerroController::class, 'candidatos']);

Route::post('/interacciones', [InteraccionController::class, 'store']);

Route::get('/matches', [InteraccionController::class, 'matches']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 

Route::apiResource('perros', PerroController::class);

Route::post('/perros/aceptar', [PerroController::class, 'aceptar']);

Route::post('/perros/rechazar', [PerroController::class, 'rechazar']);
