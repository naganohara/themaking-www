<?php

namespace App\Http\Middleware;

use Closure;

class ForceSecure
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (self::IsHttps() && !$request->secure()) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }

    /**
     * @return bool
     */
    private static function IsHttps() {
        return str_contains(\Config::get('app.url'), 'https://');
    }
}
