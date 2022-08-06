<?php

namespace Tir\Authorization\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tir\Authorization\Access;

class AclMiddleware
{
    /**
     * Run the request filter.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $module = (explode('.', Route::currentRouteName()));
        Access::execute($module[1], $module[2]);

        return $next($request);
    }
}
