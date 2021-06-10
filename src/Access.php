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
        $permissions = Permission::whereIn('role_id', $rolesId)->where('module', $module)->where('action', $action)->get();
        $access = '';
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
}
