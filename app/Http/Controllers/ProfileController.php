<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $userData = base64_decode($data['UserData']);

        return view('profile', [
            'loggedUser' => $loggedUser,
            'avatarUrl' => $avatarUrl,
            'userData' => $userData
        ]);
    }
}
