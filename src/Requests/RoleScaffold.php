<?php

namespace Tir\Authorization\Requests;

use Tir\Crud\Support\Scaffold\Fields\Custom;
use Tir\Crud\Support\Scaffold\Fields\Text;
use Tir\Crud\Support\Scaffold\Fields\Select;
use Tir\Crud\Support\Scaffold\Fields\Blank;
use Tir\Crud\Support\Module\Modules;



trait RoleScaffold
{

    private $fields;

    protected function setFields(): array
    {
        $this->fields = [
            Text::make('name'),
            Text::make('slug'),
        ];

        $this->getPersmissionData();

        return $this->fields;

    }

    protected function setModuleName(): string
    {
        return 'role';
    }

    private function getPersmissionData()
    {
        $modules = collect(Modules::list());

        $modules = $modules->map(function ($item, $key) {
            $data['name'] = $item->name;
            $data['permissions'] = $item->permissions;
            return $data;
        });
        foreach ($modules as $module){
            array_push($this->fields, Blank::make('sperator')->value('<h2 class="bg-gray-100 text-center p-4 mb-3 rounded-md text-xl uppercase">' . $module['name'] . '</h2>')->hideFromIndex());
            foreach ($module['permissions'] as $permission){
                $name ="permissions." .$module['name'].".".$permission['page']['value'];
                array_push($this->fields, Permission::make($name)->data(...$permission['access'])->display($permission['page']['value'])->hideFromIndex());
            }
        }
    }
}
