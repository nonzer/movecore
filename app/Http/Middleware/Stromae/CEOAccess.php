<?php

namespace App\Http\Middleware\Stromae;

use Closure;

class CEOAccess
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
        if (!$request->user()->hasRole('CEO')){
            return redirect()->route('error-503');
        }

        return $next($request);
    }
}
