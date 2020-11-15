<?php

namespace AngryMoustache\Rambo\Http\Middleware;

use AngryMoustache\Rambo\RamboAuth;
use Closure;

class RamboAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (! RamboAuth::user()) {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}
