<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
            $user = Auth::user();

            if ($user->hasRole('CEO')){
                return redirect()->route('dashboard');
            }elseif ($user->hasRole('Admin')){
                return redirect()->route('personal.index');
            }elseif ($user->hasRole('Chef_unite')){
                return redirect()->route('order.search');
            }elseif ($user->hasRole('GRC')){
                return redirect()->route('customer_relation');
            }
        }

        return $next($request);
    }
}
