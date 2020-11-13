<?php
namespace App\Permission\Traits;
use App\Questionary;

trait UserTrait {

  //roles  relacionados con un usuario
  public function roles(){
    return $this->belongsToMany('\App\Permission\Models\Role')->withTimestamps();
  }

  //questionary relacionasdos con un usuario
  public function questionaries(){
    return $this->hasMany(Questionary::class);
  }

  public function havePermission($permission){
    //obtengo los roles del usuario
    $roles_user = $this->roles;

    //recorro cada rol y lo comparo
    foreach ($roles_user as $role) {
      //si tiene full acceso a los permisos regreso true
      if ($role['full-access'] == 'Si') {
        return true;
      }
      //recorro los permisos correspondientes al rol
      foreach ($role->permissions as $permission_user) {
        //verifico si tiene entre sus permisos el permiso a verificar en la function
        //si lo tiene regreso true
        if ($permission_user->slug == $permission) {
          return true;
        }
      }
    }
    //sino tiene ningun permiso regreso false
    return false;
  }
}

?>
