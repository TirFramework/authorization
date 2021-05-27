<?php

namespace Tir\Blog\Entities;

use Tir\Crud\Support\Scaffold\BaseScaffold;
use Tir\Crud\Support\Scaffold\Fields\OneToMany;
use Tir\Crud\Support\Scaffold\Fields\Select;
use Tir\Crud\Support\Scaffold\Fields\Text;
use Tir\User\Entities\User;

Class RoleScaffold extends BaseScaffold
{

    public bool $localization = false;

    protected function setFields(): array
    {
        return [
            Text::make('title'),
            OneToMany::make('user_id')->relation('user','name')
        ];

    }

    protected function setName(): string
    {
        return 'postCategory';
    }


    protected function setModel(): string
    {
        return Role::class;
    }
}