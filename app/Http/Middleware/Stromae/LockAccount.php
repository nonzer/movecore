<?php

namespace App\Http\Middleware\Stromae;

use Closure;

class LockAccount
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
        if($request->session()->has('locked')){
            return redirect()->route('lockscreen.index');
        }

        return $next($request);
    }
}
