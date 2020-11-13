<?php
Route::get('/test', function () {
/*
  return Role::create([
    'name' => 'Admin',
    'slug' => 'admin',
    'description' => 'Administrator',
    'full-access' => 'yes'
  ]);
  return Role::create([
    'name' => 'Guest',
    'slug' => 'guest',
    'description' => 'guest',
    'full-access' => 'no'
  ]);
  return Role::create([
    'name' => 'Test',
    'slug' => 'test',
    'description' => 'test',
    'full-access' => 'no'
  ]);
  $user = User::find(1);
  $user->roles()->sync([1, 2]);
  return $user->roles;

  return Permission::create([
    'name' => 'List product',
    'slug' => 'product.index',
    'description' => 'Puede listar un producto'
  ]);
  */
  $roles = Role::find(2);
  $roles->permissions()->sync([1]);
  return $roles->permissions;
});




?>
