<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;


use Closure;
use Illuminate\Support\Facades\Redirect;

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
        $user_log = \Auth::user();
        
        if (isset($user_log)) {
            if ($user_log->user_role != "admin") {
                return redirect('sin acceso');
            }
        } else {
            return redirect('admin/dashboard');
        }
        
        return $next($request);
    }
    
}
