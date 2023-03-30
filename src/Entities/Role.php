<?php

namespace Tir\Authorization\Entities;

use Tir\Authorization\Requests\RoleScaffold;
use Tir\Crud\Support\Eloquent\BaseModel;


class Role extends BaseModel
{
    use RoleScaffold;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'slug', 'name', 'status'];



    public function permissions(): object
    {
        return $this->hasMany(Permission::class);
    }


}
