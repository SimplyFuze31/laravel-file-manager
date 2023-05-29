<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function show(){
        return view('login');
    }
    
    public function login(Request  $request){

        $incomingfields = $request->validate([

            'email' => ['required','email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($incomingfields)){
            $request->session()->regenerate();
            return redirect('/filepage');
        }else{
            return redirect()->back()->with('error','Невірні дані');
        }
    }
}
