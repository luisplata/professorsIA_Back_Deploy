<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Tymon\JWTAuth\Facades\JWTAuth;

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:api');

Route::get('user', function () {
    return JWTAuth::parseToken()->authenticate();
})->middleware('auth:api');



Route::post('/register', [RegisterController::class, 'register']);

Route::post('/generate-text', [OpenAIController::class, 'generateText']);

