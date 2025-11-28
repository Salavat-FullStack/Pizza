<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetCookieController extends Controller
{
    public function setCookie(Request $request){
        // $token = $request->input('token');

        // dd($token);

        // return response()->json([
        //     'request' => $request
        // ]);

        $avatarUrl = $request->input('tokenValue');
        $tokenName = $request->input('tokenSetName');

        return response()->json([
            'message' => 'Кука установлена'
        ])->cookie($tokenName, $avatarUrl, 60 * 24 * 30, '/', null, false, true);

    }
}
