<?php

namespace AngryMoustache\Rambo\Http\Middleware;

use AngryMoustache\Rambo\Facades\Rambo;
use Closure;

class RamboAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (! Rambo::user()) {
            session(['intended-redirect' => $request->url()]);
            return redirect(route('rambo.auth.login'));
        }

        return $next($request);
    }
}
