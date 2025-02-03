<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NoIndexNoFollow
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Add no-index, no-follow headers
        if(!app()->environment('production'))
            $response->header('X-Robots-Tag', 'noindex, nofollow');

        return $response;
    }
}
