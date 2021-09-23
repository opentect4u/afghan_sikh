<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class IsAdmin
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
        if(isset(Session::get('admin')[0]['user_type']) && Session::get('admin')[0]['user_type'] == 'A'){
            return $next($request);
        }
   
        return redirect('/admin/login');
    }
}
