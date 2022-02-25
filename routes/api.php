<?php

use App\Http\Controllers\TodosController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\UsersController;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users'], function() {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);
    Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::post('/logout', [LoginController::class, 'logout']);
        Route::get('/', [UsersController::class, 'user']);
    });
});

Route::group(['prefix' => 'todos', 'middleware' => 'auth:sanctum'], function() {
    Route::post('/', [TodosController::class, 'create']);
    Route::put('/{id}', [TodosController::class, 'update']);
    Route::delete('/{id}', [TodosController::class, 'delete']);
    Route::get('/', [TodosController::class, 'todos']);
    Route::get('/{id}', [TodosController::class, 'find']);
});