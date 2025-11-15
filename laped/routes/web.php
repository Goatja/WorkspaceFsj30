<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/consultas', [ConsultasController::class, 'runQueries']);
