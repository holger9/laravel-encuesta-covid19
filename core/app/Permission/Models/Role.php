<?php

namespace App\Permission\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $fillable = [
        'name', 'description', 'full-access',
    ];

    //usuarios relacionados con este rol
    public function users(){
      return $this->belongsToMany('App\User')->withTimestamps();
    }

    //permisos  relacionados con  este rol
    public function permissions(){
      return $this->belongsToMany('App\Permission\Models\Permission')->withTimestamps();
    }
}
