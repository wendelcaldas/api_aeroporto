<?php

use App\Http\Controllers\AeroportoController;
use App\Http\Controllers\VooController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rota especifica pra gerar token enquanto a auth nao é feita
Route::get('/token', [VooController::class, 'geraToken']);

Route::get('/aeroportos/{id?}', [AeroportoController::class, 'buscaAeroporto']);

Route::get('/voo/listar', [VooController::class, 'listaVoo']);
Route::post('/voo/cadastrar', [VooController::class, 'cadastraVoo']);