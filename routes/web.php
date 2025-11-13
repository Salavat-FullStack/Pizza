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

// Route::get('/registr-pizza',function () {
//     return view('registr_pizza');
// })->name('registr-pizza');

// Route::get('/registr-pizza', function () {
//     return view('registr_pizza');
// })->middleware('check.auth.token')->name('registr-pizza');

Route::post('/set-cookie', function (\Illuminate\Http\Request $request) {
    $token = $request->input('token');

    // Ставим HttpOnly cookie для своего домена
    return response()->json(['message' => 'Cookie установлена'])
        ->cookie(
            'authToken',   // имя cookie
            $token,        // значение токена
            60 * 24 * 30,  // время жизни в минутах
            '/',           // путь
            null,          // домен (null = текущий)
            false,         // secure (true для HTTPS)
            true           // HttpOnly
        );
});

Route::middleware('check.auth.token')->group(function () {
    Route::get('/registr-pizza', function () {
        return view('registr_pizza');
    })->name('registr-pizza');
});

// Route::get('/', );