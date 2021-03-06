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
            'password'=>bcrypt(request('password')),
            'token_id'=>str_random(8)
        ]);

        // auth()->login($user);  //ugradjena funkcija za logovanje usera

        Mail::to($user->email)->send(new VerifyAccount($user));
        
        return redirect('/login')
        ->with('message', 'Thank you for registering on www.nba.com. Please check your email to verify account.');
    }

    public function verify($token)
    {
        $user = User::where('token_id', $token)->first();
        if($user->is_verified < 1)
        {
            $user->is_verified = 1;
            $user->save();
            return redirect('/login')
            ->with('message', 'Your account has been verified. Proceed with logging in.');
        }
        else
        {
            return redirect('/login')
            ->with('message', 'Your account has already been verified. Please try logging in instead.');
        }
    }
}
