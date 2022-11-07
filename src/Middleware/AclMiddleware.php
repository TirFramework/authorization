<?php

namespace Tir\Authorization\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Tir\Authorization\Access;
use Tir\Crud\Support\Eloquent\BaseModel;

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
        $moduleName = $request->input('crudModuleName');
        $actionName = $request->input('crudActionName');
        $modelName = $request->input('crudModelName');

        $modelName::addGlobalScope('accessLevel', function (Builder $builder)use($moduleName, $actionName) {
            $access = Access::check($moduleName, $actionName);
            if ($access == 'owner') {
                return $builder->where('user_id', '=', Auth::id());
            }elseif ($access != 'allow') {
                abort(403, 'you don\'t have access to this area');
            }
        });
        return $next($request);
    }
}
