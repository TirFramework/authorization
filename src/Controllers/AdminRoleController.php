<?php

namespace Tir\Authorization\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Tir\Authorization\Entities\Permission;
use Tir\Authorization\Entities\Role;
use Tir\Crud\Controllers\CrudController;

class AdminRoleController extends CrudController
{
    public function store(Request $request): JsonResponse
    {

        DB::transaction(function () use ($request) { // Start the transaction
            $data = $request->all();
            $userId = Auth::id();
            $preparedData = [];
            $role = Role::create(['name' => $data['name'], 'slug' => $data['slug']]);
            foreach ($data['permissions'] as $module => $permission) {
                foreach ($permission as $action => $access) {
                    array_push($preparedData, [
                            'role_id' => $role->id,
                            'module'  => $module,
                            'action'  => $action,
                            'access'  => $access
                        ]

                    );
                }
            }
            Permission::insert($preparedData);
        });

        return $this->storeReturn($request);

    }

    public function updateCrud(Request $request, $id, $item)
    {
        return DB::transaction(function () use ($request, $item) { // Start the transaction
            $data = $request->all();
            $userId = Auth::id();
            $preparedData = [];
            $item->update(['name' => $data['name'], 'slug' => $data['slug']]);

            $item->permissions()->delete();


            foreach ($data['permissions'] as $module => $permission) {
                foreach ($permission as $action => $access) {
                    array_push($preparedData, [
                            'role_id' => $item->id,
                            'module'  => $module,
                            'action'  => $action,
                            'access'  => $access
                        ]

                    );
                }
            }
            Permission::insert($preparedData);
            return $item;
        });
    }

    protected function setModel(): string
    {
        return Role::class;
    }


}