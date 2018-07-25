<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class VerifyAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
    {
        $email = $request->get('email');
        $user = User::where('email', $email)->get();
        $is_verified = $user[0]->is_verified;

        if($is_verified < 1) {
            return response(view('auth.not-verified'));
        }
        return $next($request);
    }
}
