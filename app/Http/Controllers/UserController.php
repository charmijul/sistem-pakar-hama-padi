<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
                'email' => 'required|email:dns',
                'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        
        return back()->with('loginError','Login Failed!');
    }
    
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    
    public function tambah(){
        $userBaru = [
            "name" => "bintang",
            "email" => "bintang@gmail.com",
            "password" => bcrypt('qwerty')
        ];
        
        User::create($userBaru);
        return redirect('/home');
    }
}
