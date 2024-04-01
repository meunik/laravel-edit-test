<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buscar/{id}', [TesteController::class, 'show']);
Route::post('/editar', [TesteController::class, 'edit']);
