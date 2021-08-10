<?php

namespace Tir\Authorization\Requests;

use Tir\Crud\Support\Scaffold\Fields\Custom;
use Tir\Crud\Support\Scaffold\Fields\Text;


trait RoleScaffold
{


    protected function setFields(): array
    {
        return [
            Text::make('name')->rules('required'),
            Text::make('slug')->rules('required'),
            Custom::make('permissions')->type('permissions')->hideFromIndex()
        ];

    }

    protected function setModuleName(): string
    {
        return 'role';
    }
}