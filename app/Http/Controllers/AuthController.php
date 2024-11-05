<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login (){
        return view('auth.login');
    }

    public function registerPage (){
        return view('auth.register');
    }


    public function logout (){
        auth::logout();
        return redirect()->route('login');
    }

    public function elogin (Request $request){
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                
                return redirect()->route('home');
            }else{
                return redirect()->back()->with('Error','Login Doesnt match our credential');
            }
          
    }

    public function register (Request $request){

        $request->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'email' => ['required', 'email','unique:users'],
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required'],
        ]);

        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
        ]);

        if($user){
            return redirect()->route('login')->with('success','Registration Complete');
        }
            
      
    }
}
