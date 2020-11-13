<?php

namespace App\Permission\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

  protected $fillable = [
      'name', 'slug', 'description',
  ];

  //roles  relacionados con un usuario
  public function roles(){
    return $this->belongsToMany('\App\Permission\Models\Role')->withTimestamps();
  }

}
