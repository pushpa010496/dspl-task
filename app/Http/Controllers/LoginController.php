<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{ 
    protected $redirectLogoutTo = '/login';

    public function Login()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $user = $request->validate([
           'email'=> 'required|email',
           'password'=>'required',
        ]);

        if(Auth::attempt($user)){
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'email'=>'The provided credentials do not match',
        ])->onlyInput('email');
    }

    public function Logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect($this->redirectLogoutTo);
    }
}
