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
        $password = $request->get('password');

        if($email && $password)
        {
            $user = User::where('email', $email)->get();
            if(!empty($user[0]))
            {
                if (!$user[0]->is_verified) {
                    return redirect()->back()->with('message', 'You need to verify your account. We have sent you an activation code, please check your email.');
                }
            }
            else if(empty($user[0]))
            {
                return redirect()->back()->with('message', 'No account associated with this email address. Please register to continue.');
            }
        }

        
        return $next($request);
    }
}
