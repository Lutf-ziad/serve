<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class useracss
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$useradmin)
    {
       if(auth()->user()->is_admin == $useradmin){
        return $next($request);
       }
       return response()->json(['ليس لك صلاحيه للوصول لصفحه ']);
    }
}
