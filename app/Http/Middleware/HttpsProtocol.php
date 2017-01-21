<?php

namespace App\Http\Middleware;

use Closure;

class HttpsProtocol
{
    public function handle($request, Closure $next)
    {
        $request->setTrustedProxies([$request->getClientIp()]);

        if (env('APP_ENV') != 'local' && (!$request->secure() && ($_SERVER['HTTP_HOST'] != 'astrogame.me'))) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
