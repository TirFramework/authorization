<?php

namespace Tir\Acl;

class Permission
{
    public static function list(){
        //TODO Development Acl
        return [
            'index'=>'all',
            'show'=>'all',
            'create'=>'all',
            'edit'=>'all',
            'destroy'=>'all',
            'trash'=>'all',
            'forceDestroy'=>'all',
        ];
    }

    // public static function check(){
    //     return 'all';
    // }

    // public static function execute(){
    //     $permission = Static::check();
    //     if( $permission == 'deny'){
    //         abort('403');
    //     }else{
    //         return $permission;
    //     }
    // }
}
