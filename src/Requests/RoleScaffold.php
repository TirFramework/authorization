<?php

namespace Tir\Role\Requests;

use Tir\Authorization\Entities\Role;
use Tir\Crud\Support\Scaffold\BaseScaffold;
use Tir\Crud\Support\Scaffold\Fields\Custom;
use Tir\Crud\Support\Scaffold\Fields\Text;


class RoleScaffold extends BaseScaffold
{

    public bool $localization = false;

    protected function setFields(): array
    {
        return [
            Text::make('name'),
            Text::make('slug'),
            Custom::make('permissions')
        ];

    }

    protected function setName(): string
    {
        return 'role';
    }


    protected function setModel(): string
    {
        return Role::class;
    }
}