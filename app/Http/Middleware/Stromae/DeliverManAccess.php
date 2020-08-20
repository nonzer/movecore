<?php

namespace App\Http\Middleware\stromae;

use Closure;

class DeliverManAccess
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
        if (!$request->user()->hasRole('Livreur')){
            return redirect()->route('error-503');
        }
        return $next($request);
    }
}
