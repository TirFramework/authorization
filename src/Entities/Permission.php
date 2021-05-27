<?php

namespace Tir\Authorization\Entities;

use Tir\Authorization\access;
use Tir\Crud\Support\Eloquent\CrudModel;
use Tir\User\Entities\User;

class Permission extends CrudModel
{

    protected $fillable = ['id', 'model', 'action', 'access'];


}
