<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Question;

class Questionary extends Model {

  protected $fillable = [
     'name', 'status', 'user_id'
  ];

  public function user(){
    return $this->belongsTo(User::class);
  }

  //questions relacionasdas con un questionary
  public function questions(){
    return $this->hasMany(Question::class);
  }

}
