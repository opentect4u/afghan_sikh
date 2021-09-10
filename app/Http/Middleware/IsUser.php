<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(isset(Session::get('user')[0]['user_type']) && Session::get('user')[0]['user_type']=='U'){
            // if(isset(Session::get('gurudwara')[0]['user_type']) == 'G'){
            return $next($request);
        }
   
        return redirect('/user/login');
    }
}
