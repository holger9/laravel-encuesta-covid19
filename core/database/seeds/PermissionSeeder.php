<?php

use Illuminate\Database\Seeder;
use App\Permission\Models\Role;
use App\Permission\Models\Permission;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder {
  /**
    * Run the database seeds.
    *
    * @return void
  */
  public function run() {
      DB::statement("SET foreign_key_checks=0"); //desabilitamos referencias a foreign key
        //truncar tables
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        Permission::truncate();
        Role::truncate();
      DB::statement("SET foreign_key_checks=1"); //habilitamos referencias a foreign key

      //Permissions
      $permissions_all = [];
      //new permission
      $permission = Permission::create([
        'name' => 'Show own user',
        'slug' => 'userown.show',
        'description' => 'Ver el usuario propio'
      ]);

      $permissions_all[] = $permission->id;

      $permission = Permission::create([
        'name' => 'Edit own user',
        'slug' => 'userown.edit',
        'description' => 'Editar el usuario propio'
      ]);

      $permissions_all[] = $permission->id;

      //Permission role
      $permission = Permission::create([
        'name' => 'List role',
        'slug' => 'role.index',
        'description' => 'Permite ver la lista de roles creados'
      ]);

      $permissions_all[] = $permission->id;

      $permission = Permission::create([
        'name' => 'Show role',
        'slug' => 'role.show',
        'description' => 'Visualiza un rol'
      ]);

      $permissions_all[] = $permission->id;

      $permission = Permission::create([
        'name' => 'Create role',
        'slug' => 'role.create',
        'description' => 'Crear un rol'
      ]);

      $permissions_all[] = $permission->id;

      $permission = Permission::create([
        'name' => 'Edit role',
        'slug' => 'role.edit',
        'description' => 'Editar un rol'
      ]);

      $permissions_all[] = $permission->id;

      $permission = Permission::create([
        'name' => 'Destroy role',
        'slug' => 'role.destroy',
        'description' => 'Eliminar un rol'
      ]);

      $permissions_all[] = $permission->id;
      //End Permission role

      //Permissions user
      $permission = Permission::create([
        'name' => 'List user',
        'slug' => 'user.index',
        'description' => 'Permite ver la lista de usuarios creados'
      ]);

      $permissions_all[] = $permission->id;

      $permission = Permission::create([
        'name' => 'Show user',
        'slug' => 'user.show',
        'description' => 'Visualizar un usuario'
      ]);

      $permissions_all[] = $permission->id;

      $permission = Permission::create([
        'name' => 'Create user',
        'slug' => 'user.create',
        'description' => 'Crear un usuario'
      ]);

      $permissions_all[] = $permission->id;

      $permission = Permission::create([
        'name' => 'Edit user',
        'slug' => 'user.edit',
        'description' => 'Editar un usuario'
      ]);

      $permissions_all[] = $permission->id;

      $permission = Permission::create([
        'name' => 'Destroy user',
        'slug' => 'user.destroy',
        'description' => 'Eliminar un usuario'
      ]);

      $permissions_all[] = $permission->id;

      //End permissions user
    }
}
