<?php

namespace Tir\Authorization;

use Illuminate\Support\Facades\Auth;
use Tir\Store\Search\Builder;

class access
{
    public static function check(string $model, string $action): string
    {
        $roles = Auth::user()->roles()->with('permissions')->get();

        $access = 'deny';
        foreach($roles as $role)
        {
            $permission = $role->permissions->where('model', $model)->where('action', $action)->first();
            if(isset($permission->access)){
                if($permission->access == 'allow')
                {
                    $access = 'allow';
                    break;
                }

                if($permission->access == 'owner')
                {
                    $access = 'owner';
                }

            }


        }

        return $access;
    }

     public static function execute(string $model, string $action)
     {
         $access = Access::check($model, $action);
         if( $access == 'deny'){
             abort('403');
         }else{
             return $access;
         }
     }
}
