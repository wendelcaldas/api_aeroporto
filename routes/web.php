<?php

use App\Http\Controllers\AeroportoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aeroportos/{id?}', [AeroportoController::class, 'buscaAeroporto']);