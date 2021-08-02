<?php

namespace Tir\Authorization;

use Illuminate\Support\Facades\Auth;
use Tir\Authorization\Entities\Permission;

class Access
{
    /**
     * Check permissions to access the module
     *
     * @param string $module
     * @param string $action
     * @return string
     */
    public static function check(string $module, string $action): string
    {
        $rolesId = Auth::user()->roles()->get()->pluck('id');
        $action = static::actionChecker($action);
        $permissions = Permission::whereIn('role_id', $rolesId)->where('module', $module)->where('action', $action)->get();
        $access = 'deny';

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
            abort('403');
        }
        return $access;
    }

    private static function actionChecker($action)
    {
        if ($action == 'data' || $action == 'select') {
            $action = 'index';
        }

        if ($action == 'update') {
            $action = 'edit';
        }

        if ($action == 'store') {
            $action = 'create';
        }

        if ($action == 'restore') {
            $action = 'destroy';
        }


        return $action;

    }
}
