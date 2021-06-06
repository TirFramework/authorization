<?php

namespace Tir\Authorization\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Tir\Authorization\Access;

class AclMiddleware
{
    /**
     * Run the request filter.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $module = (explode('.', Route::currentRouteName()));
        $action = explode('@', Route::currentRouteAction());


        Access::execute($module[1], $action[1]);
        return $next($request);
    }
}