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
            'id' => '1',
            'user_id' => '1',
            'role_id' => '1',
            'model' => 'user',
            'action' => 'index',
            'access' => 'allow',
        ]);

        DB::table('permissions')->insert([
            'id' => '2',
            'user_id' => '1',
            'role_id' => '2',
            'model' => 'user',
            'action' => 'index',
            'access' => 'deny',
        ]);

        DB::table('permissions')->insert([
            'id' => '3',
            'user_id' => '1',
            'role_id' => '1',
            'model' => 'user',
            'action' => 'edit',
            'access' => 'allow',
        ]);


        DB::table('role_user')->insert([
            'id' => '1',
            'user_id' => '1',
            'role_id' => '1',
        ]);

        DB::table('role_user')->insert([
            'id' => '2',
            'user_id' => '1',
            'role_id' => '2',
        ]);

        Schema::enableForeignKeyConstraints();

    }
}
