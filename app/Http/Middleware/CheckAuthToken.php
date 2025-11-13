<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->cookie('authToken');

        if (!$token) {
            return redirect('/login');
        }

        // Отправляем токен на микросервис для проверки
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$token}"
        ])->post('http://127.0.0.1:8000/me');

        if ($response->status() !== 200) {
            return redirect('/login');
        }

        return $next($request);
    }
}