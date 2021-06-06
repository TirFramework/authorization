<?php

namespace Tir\Authorization\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Tir\Authorization\Requests\RoleScaffold;
use Tir\Crud\Support\Eloquent\BaseModel;


class Role extends BaseModel
{
    use RoleScaffold;
    use sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'slug', 'name', 'status'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug'
            ]
        ];
    }

    //Additional methods //////////////////////////////////////////////////////////////////////////////////////////////

    public function permissions(): object
    {
        return $this->hasMany(Permission::class);
    }


    //Relations methods ///////////////////////////////////////////////////////////////////////////////////////////////
}
