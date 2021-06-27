<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        
        return view('backend.auth.login');
    }

    public function loginPost(Request $request){
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            toastr()->success('Tekrardan Hoşgeldiniz..');
            return redirect()->route('dashboard');
    
        }
        else{
            return redirect()->route('login')->withErrors('Email adresi veya şifre hatalı!');
        }
        
    }

    public function logout(){
    
        Auth::logout();
        return redirect()->route('login');
          
        
    }
}
