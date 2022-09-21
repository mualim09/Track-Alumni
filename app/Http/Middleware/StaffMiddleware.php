<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class StaffMiddleware
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
            
            if(auth()->guard('staff')->user()->status == 'Inactive'){
                
                Auth::guard('staff')->logout();

                return redirect()->route('staff.login')->with('message', trans('your account need admin approval'));

            }
        }

        return $next($request);
    }
}
