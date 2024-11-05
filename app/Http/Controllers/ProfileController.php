<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $user = User::findOrFail(Auth::id());
        return view('profile.index',[
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request){
        $id = auth::id();
        $request->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'email' => ['required', 'email','unique:users,email,' . $id],           
        ]);

        $user = User::where('id',$id)->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success','Profile Updated');
    }

    public function changePassword(Request $request){
        $id = auth::id();
        $request->validate([
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required'],      
        ]);

        $user = User::where('id',$id)->update([
            'password' =>Hash::make($request->password),
        ]);

        return redirect()->back()->with('success','Password Updated');
    }
}
