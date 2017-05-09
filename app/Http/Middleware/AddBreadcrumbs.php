<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class AddBreadcrumbs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $breadcrumbs[] = ['title' => 'ZJX ARTCC', 'route' => 'index'];
        if(active('dashboard')) {
            $breadcrumbs[] = ['title' => 'Dashboard', 'route' => 'dashboard'];
        }
        if(active('dummy')) {
            $breadcrumbs[] = ['title' => 'Dashboard', 'route' => 'dashboard'];
        }

        View::share('breadcrumbs', $breadcrumbs);
        return $next($request);
    }
}
