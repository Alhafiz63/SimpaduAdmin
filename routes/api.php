<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return 'Hello World';
    return $request->user();
});


Route::get('/user/{id}', [AuthController::class, 'show']);


Route::post('/login', [AuthController::class, 'login']);
