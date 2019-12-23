<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
class ActivateController extends Controller
{
    public function active(Request $request)
    {
        $user = User::where('email',$request->email)->where('activation_token',$request->token)->firstOrFail();
       // $user = User::ByActivationCoulmns($request->email,$request->token)->firstOrFail();
        

        $user->update([
            'active' =>true,
            'activation_token' =>null
        ]);

        Auth::loginUsingId($user->id);

        return redirect()->route('home')->withSuccess('Activated!You\'re now signed in.');
    }
}
