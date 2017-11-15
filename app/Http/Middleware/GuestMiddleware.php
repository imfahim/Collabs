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
          if(Session::has('is_company') || Session::get('is_company') === true){
            Session::flash('info', 'You are already logged in !');
            return redirect()->route('company.home');
          }
          if(Session::has('is_user') || Session::get('is_user') === true){
            Session::flash('info', 'You are already logged in !');
            return redirect()->route('user.home');
          }
        }
        return $next($request);
    }
}
