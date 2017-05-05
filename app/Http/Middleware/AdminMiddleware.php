<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if (!Auth::check())
            return redirect()->route('login')->with('status', __('acl.accessdenied'));

       // Admin
        
            if(Auth::user()->role_id == '2' and Auth::user()->active == 1 and Auth::user()->confirmed == 1){
                return $next($request);
            }
           
        
        return redirect()->route('home')->with('status', __('acl.accessdenied'));
    }
}
