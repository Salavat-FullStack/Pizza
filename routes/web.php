<?php

use App\Http\Controllers\Api\PizzaController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);
// Route::post('/setSessionPizza', [PizzaController::class, 'setSessionPizza']);
// Route::get('/getSessionPizza', [PizzaController::class, 'getSessionPizza']);
Route::post('/pizza/view', [PizzaController::class, 'showPizzaView'])->name('pizza.view');

Route::get('/register',function () {
    return view('auth.register');
})->name('register');

Route::get('/login',function () {
    return view('auth.login');
})->name('login');

// Route::get('/', );