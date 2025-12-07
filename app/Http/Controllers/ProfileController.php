<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\SetCookieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function render(Request $request){
        if($request->cookie('authToken')){
            $loggedUser = true;
        }else{
            $loggedUser = false;
        }
        $data = $request->cookie();

        $avatarUrl = base64_decode($data['avatarUrl']);
        // $userData = base64_decode($data['UserData']);
        $cookies = $request->cookies->all();

        $response = Http::withCookies($cookies, '127.0.0.1')
            ->post('http://127.0.0.1:8000/api/returnUser');

            // dd($response->body());

        $data = $response->json();

        // dd($response->json());
        
        // $userData = Http::post('http://127.0.0.1:8001/api/set-cookie', $data);

        $setCookieController = new SetCookieController();

// Создаём искусственный Request с нужными данными
        $requestForCookie = new Request($data);

        // Вызываем метод напрямую
        $response = $setCookieController->setCookie($requestForCookie);

        // Если нужно, получить JSON
        $userData = $response->getData(true);

        // dd($userData);

        $cookies = $response->headers->getCookies();

        $userData = [];
        foreach ($cookies as $cookie) {
            $userData[$cookie->getName()] = base64_decode($cookie->getValue());
        }

        // dd(json_decode($userData['UserData'], true));

        return view('profile', [
            'loggedUser' => $loggedUser,
            'avatarUrl' => $avatarUrl,
            'userData' => json_decode($userData['UserData'], true)
        ]);
    }
}
