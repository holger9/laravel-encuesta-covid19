<?php

use Illuminate\Database\Seeder;
use App\Permission\Models\Role;

class RoleSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
  */
  public function run() {
    //creamos el rol admin
    Role::create([
      'name' => 'Admin',
      'description' => 'Rol correspondiente al administrador del sistema con los permisos completos.',
      'full-access' => 'Si'
    ]);

    //creamos el rol Registered Users
    $rolUser = Role::create([
      'name' => 'Usuario registrado',
      'description' => 'Rol correspondientes a los usuarios no administradores de la plataforma.',
      'full-access' => 'No'
    ]);

    $rolUser->permissions()->sync([1, 2]);
  }

}
