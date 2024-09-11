<?php

use Illuminate\Support\Facades\Route;
/* use App\Http\Controllers\OpenAIController; */
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
/* use App\Http\Controllers\Auth\RegisterController; */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[UserController::class, 'index']) ->name('index');


/* OPEN AI ROUTES */
/* Route::get('/openai', [OpenAIController::class, 'index'])->name('openai.index'); */
/* Route::post('/openai', [OpenAIController::class, 'submit'])->name('openai.submit'); */
/* Route::post('/generate-text', [OpenAIController::class, 'generateText']); */


/* LOGIN AND REGISTER ROUTES */

Route::post('loggingin',[UserController::class, 'loggingin'])->name('loggingin');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('userRegister', [RegisterController::class, 'userRegister'])->name('userRegister');

//RUTAS UTILIZANDO AUTH
/* Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('registerUser', [RegisterController::class, 'registerUser'])->name('registerUser'); */


Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');