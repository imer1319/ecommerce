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
        Permission::create(['name' => 'user_management_access', 'description' => 'Acceder al usuario']);
        Permission::create(['name' => 'users_index', 'description' => 'Listar usuarios']);
        Permission::create(['name' => 'users_edit', 'description' => 'Editar usuarios']);
        Permission::create(['name' => 'users_show', 'description' => 'Ver usuarios']);
        Permission::create(['name' => 'users_create', 'description' => 'Crear usuarios']);
        Permission::create(['name' => 'users_destroy', 'description' => 'Eliminar usuarios']);
        /********  Roles  ********/
        Permission::create(['name' => 'roles_index', 'description' => 'Listar roles']);
        Permission::create(['name' => 'roles_edit', 'description' => 'Editar roles']);
        Permission::create(['name' => 'roles_show', 'description' => 'Ver roles']);
        Permission::create(['name' => 'roles_create', 'description' => 'Crear roles']);
        Permission::create(['name' => 'roles_destroy', 'description' => 'Eliminar roles']);
        /********  Tags  ********/
        Permission::create(['name' => 'tags_index', 'description' => 'Listar etiquetas']);
        Permission::create(['name' => 'tags_edit', 'description' => 'Editar etiquetas']);
        Permission::create(['name' => 'tags_show', 'description' => 'Ver etiquetas']);
        Permission::create(['name' => 'tags_create', 'description' => 'Crear etiquetas']);
        Permission::create(['name' => 'tags_destroy', 'description' => 'Eliminar etiquetas']);
        /********  Categories  ********/
        Permission::create(['name' => 'categories_index', 'description' => 'Listar categorias']);
        Permission::create(['name' => 'categories_edit', 'description' => 'Editar categorias']);
        Permission::create(['name' => 'categories_show', 'description' => 'Ver categorias']);
        Permission::create(['name' => 'categories_create', 'description' => 'Crear categorias']);
        Permission::create(['name' => 'categories_destroy', 'description' => 'Eliminar categorias']);
        /********  Products  ********/
        Permission::create(['name' => 'products_index', 'description' => 'Listar productos']);
        Permission::create(['name' => 'products_edit', 'description' => 'Editar productos']);
        Permission::create(['name' => 'products_show', 'description' => 'Ver productos']);
        Permission::create(['name' => 'products_create', 'description' => 'Crear productos']);
        Permission::create(['name' => 'products_destroy', 'description' => 'Eliminar productos']);

        $role = Role::findByName('Administrator');
        $role->syncPermissions(Permission::all());
    }
}
