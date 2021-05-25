<?php

namespace AngryMoustache\Rambo\Http\Middleware;

use Closure;

class LinkPickerRoute
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
