<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class AlumniMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()){
            
            if(auth()->guard('alumni')->user()->status == 'Inactive'){
                
                Auth::guard('alumni')->logout();

                return redirect()->route('alumni.login')->with('message', trans('your account need admin approval'));

            }
        }
        return $next($request);
    }
}
