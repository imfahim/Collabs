<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthMiddleware
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
        if(!Session::has('logged_in') || Session::get('logged_in') === false){
          Session::flash('fail', 'You need to login first !');
          return redirect()->route('login');
        }
        return $next($request);
    }
}
