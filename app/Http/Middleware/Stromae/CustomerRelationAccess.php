<?php

namespace App\Http\Middleware\Stromae;

use Closure;

class CustomerRelationAccess
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
        if (!$request->user()->hasRole('GRC')){
            return redirect()->route('error-503');
        }

        return $next($request);
    }
}
