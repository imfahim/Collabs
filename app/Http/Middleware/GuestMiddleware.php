<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class GuestMiddleware
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
        if(Session::has('logged_in') || Session::get('logged_in') === true){
          Session::flash('info', 'You are already logged in !');
          return redirect()->back();
        }
        return $next($request);
    }
}
