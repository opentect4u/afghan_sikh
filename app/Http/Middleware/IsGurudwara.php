<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class IsGurudwara
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
        if(Session::get('gurudwara')[0]['user_type'] == 'G'){
            return $next($request);
        }
   
        return redirect('/gurudwara/login');
    }
}
