<?php

namespace App\Http\Middleware;

use URL;
use Closure;

class PrefillRouteVariable
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handle($request, Closure $next)
    {
        URL::defaults([
           'restaurant_id' => $request->restaurant_id
        ]);

        return $next($request);
    }
}


