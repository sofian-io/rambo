<?php

namespace AngryMoustache\Rambo\Http\Middleware;

use AngryMoustache\Rambo\Facades\Rambo;
use Closure;

class RamboAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (! Rambo::user()) {
            return redirect(route('rambo.auth.login'));
        }

        return $next($request);
    }
}
