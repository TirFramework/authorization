<?php

namespace Tir\Authorization;

use Illuminate\Support\Facades\Auth;

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
        $roles = Auth::user()->roles()->with('permissions')->get();

        $access = 'allow';
        foreach ($roles as $role) {
            $permission = $role->permissions->where('module', $module)->where('action', $action)->first();
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
