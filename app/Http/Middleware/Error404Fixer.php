<?php

namespace App\Http\Middleware;

use Closure;

class Error404Fixer
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        view()->composer('project.general', function ($view) {
            $view->with('page', 'home')
                 ->with('ajax', false);
        });

        return $next($request);
    }
}
