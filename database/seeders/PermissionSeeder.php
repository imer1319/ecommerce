<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /********  Users  ********/
        Permission::create(['name' => 'user_management_access']);
        Permission::create(['name' => 'users_index']);
        Permission::create(['name' => 'users_edit']);
        Permission::create(['name' => 'users_show']);
        Permission::create(['name' => 'users_create']);
        Permission::create(['name' => 'users_destroy']);
        /********  Roles  ********/
        Permission::create(['name' => 'roles_index']);
        Permission::create(['name' => 'roles_edit']);
        Permission::create(['name' => 'roles_show']);
        Permission::create(['name' => 'roles_create']);
        Permission::create(['name' => 'roles_destroy']);
        /********  Tags  ********/
        Permission::create(['name' => 'tags_index']);
        Permission::create(['name' => 'tags_edit']);
        Permission::create(['name' => 'tags_show']);
        Permission::create(['name' => 'tags_create']);
        Permission::create(['name' => 'tags_destroy']);
        /********  Categories  ********/
        Permission::create(['name' => 'categories_index']);
        Permission::create(['name' => 'categories_edit']);
        Permission::create(['name' => 'categories_show']);
        Permission::create(['name' => 'categories_create']);
        Permission::create(['name' => 'categories_destroy']);
        /********  Products  ********/
        Permission::create(['name' => 'products_index']);
        Permission::create(['name' => 'products_edit']);
        Permission::create(['name' => 'products_show']);
        Permission::create(['name' => 'products_create']);
        Permission::create(['name' => 'products_destroy']);

        $role = Role::findByName('Administrator');
        $role->syncPermissions(Permission::all());
    }
}
