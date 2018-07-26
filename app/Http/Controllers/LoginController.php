<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('account', ['except' => ['create', 'destroy']]);
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('auth.create-login');
    }

    public function store()
    {
        $this->validate(request(), [ 
            
            "email"=>"required|email",
            "password"=>"required"
        ]);

        // $useremail = request('email');

        // $user = User::where('email', $useremail)->get();
        // $is_verified = $user[0]->is_verified;

        $credentials = request()->only(['email','password']);
        //dd($credentials);
        if(!auth()->attempt(['email' => $credentials['email'], 'password' => $credentials['password']]))
        {
            return redirect()->back()->with('message', 'Bad credentials. Please try again!');
        }

        return redirect('/teams');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/login');
    }
}
