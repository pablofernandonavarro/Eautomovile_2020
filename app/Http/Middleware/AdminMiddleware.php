<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;


use Closure;

class AdminMiddleware
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
       if(! auth()->check())
       return redirect('/login');

        if(auth()->user()->role != "admin")
        return redirect('/home');
        
         return $next($request);
        
    }
}
