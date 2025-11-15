<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//user routes
Route::get('/users', [UserController::class, 'users']);
Route::post('/users', [UserController::class, 'insert']);

//pedidos routes
Route::get('/pedidos', [PedidosController::class, 'pedidos']);
Route::post('/pedidos', [PedidosController::class, 'insert']);