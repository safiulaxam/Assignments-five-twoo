<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login.index');
    }

    public function process(Request $request){
       $credential=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=> 'Email Cannot Be Empty',
            'email.email'=> 'Email Must Be Valid',
            'password.required'=> 'Password Cannot Be Empty'
        ]);
        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->withErrors([
            'email'=>'invalid email or password',
        ])->onlyInput('email');
    }
     public function logout(Request $request){
         Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
         return redirect()->route('login');
     }

}
