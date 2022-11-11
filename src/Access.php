<?php

namespace Tir\Authorization;

use Illuminate\Support\Facades\Auth;
use Tir\Authorization\Entities\Permission;

class Access
{

    private static Access $obj;
    private static $permissions;
    public static function init(): Access
    {
        if (!isset(self::$obj)) {
            self::$obj = new Access();
            $rolesId = Auth::user()->roles()->withoutGlobalScope('accessLevel')->get()->pluck('id');
            static::$permissions = Permission::whereIn('role_id', $rolesId)->get();

        }
        return self::$obj;
    }

    /**
     * Check permissions to access the module
     *
     * @param string $module
     * @param string $action
     * @return string
     */
    public static function check(string $module, string $action)
    {
        static::init();
        $action = static::getCrudAction($action);
        $access = 'deny';
        $permissions = static::$permissions->where('module', $module)->where('action', $action);
        foreach ($permissions as $permission) {
            if (isset($permission->access)) {
                if ($permission->access == 'allow') {
                    $access = 'allow';
                    break;
                }

                if ($permission->access == 'owner') {
                    $access = 'owner';
                }
            }
        }
        return $access;
    }

    public static function execute(string $module, string $action): string
    {
        $access = Access::check($module, $action);
        if ($access == 'deny') {
            abort(403, 'You have no access to this area');
        }
        return $access;
    }

    private static function getCrudAction(string $action): string
    {
        $baseActions = ['data'=>'index', 'select'=>'index', 'store'=>'create', 'update'=>'edit', 'restore'=>'destroy'];
        if(isset($baseActions[$action])){
            return $baseActions[$action];
        }
        return $action;
    }

}
