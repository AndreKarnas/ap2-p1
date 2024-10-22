<?php

use App\Http\Controllers\FilmeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::get('/filme',[FilmeController::class, 'listar']);
route::post('/filme',[FilmeController::class, 'salvar']);
route::put('/filme/{id}',[FilmeController::class, 'editar']);
route::delete('/filme/{id}',[FilmeController::class, 'excluir']);
route::get('/filme/{id}',[FilmeController::class, 'listarPeloId']);