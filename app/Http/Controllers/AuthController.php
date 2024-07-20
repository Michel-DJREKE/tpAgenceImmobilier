<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
    //   User::create(
    //     [
    //     //   'name' => 'admin',
    //     //   'email' => 'admin@admin.com',
    //     //   'password' => Hash::make('admin'),
    //     ]
    //   );
      return view('auth.login');
    }

   public function dologin(LoginRequest $request )
   {
     $credentials = $request->validated();
     if (Auth::attempt($credentials)){
         $request->session()->regenerate();
         return redirect()->intended(route('admin.property.index'));
     }

     return back()->withErrors([
         'email' => 'Identifiants incorrect'
     ])->onlyInput('email');

   }



    public function logout()
    {
       Auth::logout();
       return Redirect()->route('home')->with('success', 'vous êtes maintenant déconnecté');
    }


}
