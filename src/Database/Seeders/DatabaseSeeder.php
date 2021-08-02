<?php

namespace Tir\Authorization\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('roles')->insert([
            'id' => '1',
            'name' => 'super admin',
            'slug' => 'super-admin',
            'status' => 'enabled',
        ]);

        DB::table('roles')->insert([
            'id' => '2',
            'name' => 'manager',
            'slug' => 'manger',
            'status' => 'enabled',
        ]);

        DB::table('permissions')->insert([
            'role_id' => '1',
            'module'  => 'user',
            'action'  => 'index',
            'access'  => 'allow',
        ]);

        DB::table('permissions')->insert([
            'role_id' => '2',
            'module'  => 'user',
            'action'  => 'index',
            'access'  => 'deny',
        ]);

        DB::table('permissions')->insert([
            'role_id' => '1',
            'module'  => 'user',
            'action'  => 'edit',
            'access'  => 'allow',
        ]);

        DB::table('permissions')->insert([
            'role_id' => '1',
            'module'  => 'role',
            'action'  => 'index',
            'access'  => 'allow',
        ]);

        DB::table('permissions')->insert([
            'role_id' => '1',
            'module'  => 'role',
            'action'  => 'create',
            'access'  => 'allow',
        ]);

        DB::table('permissions')->insert([
            'role_id' => '1',
            'module'  => 'role',
            'action'  => 'edit',
            'access'  => 'allow',
        ]);


        DB::table('role_user')->insert([
            'id'      => '1',
            'user_id' => '1',
            'role_id' => '1',
        ]);

        DB::table('role_user')->insert([
            'id'      => '2',
            'user_id' => '1',
            'role_id' => '2',
        ]);

        Schema::enableForeignKeyConstraints();

    }
}
