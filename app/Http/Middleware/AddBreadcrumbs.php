<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AddBreadcrumbs
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $activeRoute = $this->getCurrentRoute($request);

        $breadcrumbs[] = ['title' => 'ZJX ARTCC', 'route' => 'index'];

        if($activeRoute == 'pilots.routes.index') {
            $breadcrumbs[] = ['title' => 'Pilots'];
            $breadcrumbs[] = ['title' => 'Routes Analyzer'];
        }

        View::share('breadcrumbs', $breadcrumbs);
        return $next($request);
    }

    /**
     * @param Request $request
     * @return string
     */
    protected function getCurrentRoute(Request $request)
    {
        $currentUri = $request->server('REQUEST_URI');
        if(strlen($currentUri) > 1) {
            $currentUri = substr($currentUri, 1);
        }
        $routes = app()->routes->getRoutes();

        foreach($routes as $route) {
            if($route->uri == $currentUri) {
                if(isset($route->action['as'])) {
                    return $route->action['as'];
                }
                return '';
            }
        }
    }
}
