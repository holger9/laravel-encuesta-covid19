<?php

use Illuminate\Database\Seeder;
use App\Permission\Models\Permission;
use App\User;

class UserSeeder extends Seeder {
  /**
    * Run the database seeds.
    *
    * @return void
  */
  public function run() {
    //creamos el usuario Administrator
    $userAdmin = User::create([
      //user admin
      'identification' => 1118835498,
      'fullname' => 'holger azael',
      'first_surname' => 'murillo',
      'second_surname' => 'gomez',
      'email' => 'holger.murillo@sodexo.com',
      'gender' =>  'Masculino',
      'employment' => 'analista it',
      'cellphone_number' => '3007146919',
      'password' => Hash::make('admin')
    ]);

    //relacionamos el rol con el usuario en la tabla role_user
    $userAdmin->roles()->sync([1]);

    $userUser = User::create([
      //user admin
      'identification' => 77185393,
      'fullname' => 'miguel angel',
      'first_surname' => 'de avila',
      'second_surname' => 'garcia',
      'email' => 'correo77185393@gmail.com',
      'gender' =>  'Masculino',
      'employment' => 'jefe de turno i  / coordinador de cambiaderos',
      'cellphone_number' => '3205515458',
      'password' => Hash::make('77185393')
    ]);

    //relacionamos el rol con el usuario en la tabla role_user
    $userUser->roles()->sync([2]);

  }

}
