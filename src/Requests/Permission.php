<?php
namespace Tir\Authorization\Requests;


use Tir\Crud\Support\Scaffold\Fields\Select;

class Permission extends Select {

    protected string $type = 'Radio';

    protected function setValue($model)
    {
        $filedName = explode('.', $this->name);

        foreach($model->{$filedName[0]} as $permission){
            if($permission['module'] == $filedName[1] && $permission['action'] == $filedName[2]){
                $this->value = $permission['access'];
            }
        }
    }
}
