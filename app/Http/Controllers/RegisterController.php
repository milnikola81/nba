<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\VerifyAccount;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('auth.create');
    }

    public function store()    
    {
        $this->validate(request(), [ 
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|confirmed|min:6"
        ]);

       $user = User::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'password'=>bcrypt(request('password'))
        ]);

        // auth()->login($user);  //ugradjena funkcija za logovanje usera

        Mail::to($user->email)->send(new VerifyAccount($user));
        
        return redirect('/login');
    }

    public function verify(User $user)
    {
        $user->is_verified = 1;
        $user->save();
        return redirect('/login');
    }
}
