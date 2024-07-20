<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;

// use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $properties= Property::where('sold', false)->orderBy('created_at', 'desc')->limit(4)->get();
        // hacher l'information du compte connecter
        ///** @var User $user */
        //$user= User::first();
        //$user->password= '0000';
        //$user->syncChanges();

        return view('home', ['properties' => $properties]);
    }
}
