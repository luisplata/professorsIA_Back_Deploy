<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::post('/login', [LoginController::class, 'login']);

Route::post('/register', [RegisterController::class, 'register']);

Route::post('/generate-text', [OpenAIController::class, 'generateText']);


/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */
