<?php

namespace App\Http\Middleware;

use App\Sales_order;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
        $no = Sales_order::all()->count();
        if ($no > 15) {
//            return 'reach';
            Auth::logout();
            return back();
        }

        return $next($request);
    }
}
