<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Services\Login\RememberMeExpiration;

class LoginController extends Controller
{
    
    public function show(){
        return view('login');
    }
    
    public function login(Request  $request){

        // $incomingfields = $request->validate([

        //     'email' => ['required','email'],
        //     'password' => 'required'
        // ]);

        // if(auth()->attempt($incomingfields)){
        //     $request->session()->regenerate();
        //     return redirect('/folders');
        // }else{
        //     return redirect()->back()->with('error','Невірні дані');
        // }

        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));


        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }

    public function logout(){
        Session::flush();
        
        Auth::logout();

        return redirect('login');
        
    }
}
