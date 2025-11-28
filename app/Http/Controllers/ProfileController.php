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
        // $avatar = $request->cookie();

        // dd($avatar);

        return view('profile', ['loggedUser' => $loggedUser]);
    }
}
