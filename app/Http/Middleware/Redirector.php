<?php

namespace App\Http\Middleware;

use App\Facades\Redirection;
use Closure;
use App\Services\RedirectionService;
use Illuminate\Http\Request;


class Redirector
{
    public function __construct(
        // private RedirectionService $redirectionService
    ) {}

    public function handle(Request $request, Closure $next)
    {
        return filled($redirection = Redirection::makeRedirection($request))
            ? redirect($redirection['to'], $redirection['status_code'])
            : $next($request);
    }
}
