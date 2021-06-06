<?php

namespace Tir\Authorization\Entities;

use Illuminate\Database\Eloquent\Model;
use Tir\Crud\Support\Scaffold\BaseScaffold;

class Permission extends Model
{
    use BaseScaffold;

    protected $fillable = ['id', 'role_id', 'user_id', 'model', 'action', 'access'];


    protected function setModuleName(): string
    {
        return 'permission';
    }

    protected function setFields(): array
    {
        return [];
    }
}
