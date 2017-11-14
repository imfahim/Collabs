<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class UserMiddleware
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
        if(!Session::has('is_user') || Session::get('is_user') === false){
          Session::flash('fail', 'Permission Denied !');
          return redirect()->back();
        }
        return $next($request);
    }
}
