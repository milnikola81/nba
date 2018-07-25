<?php

namespace App\Http\Middleware;

use Closure;
use App\Comment;

class BadWords
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
        if(preg_match('[hate|idiot|stupid]', $request->content))
        {
            return response(view('comments.forbidden-comment'));
        }

        return $next($request);
    }
}
