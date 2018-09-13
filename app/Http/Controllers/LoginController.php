<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('/dashboard');
        }
        else return view('login_page');
    }
    public function login(Request $request){
        $credentials = $request->only('email', 'password');


        $auth = Auth::attempt($credentials);

        if ($auth){
            return redirect('/dashboard');
        }
        else{
            return redirect()->back()->with('massage', 'Email or password is incorrect');
        }

    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
