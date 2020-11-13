<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Questionary;

class Question extends Model {
  protected $fillable = [
    'question', 'hasOptions', 'options', 'isMultiple', 'hasObservation', 'questionary_id'
  ];

  public function questionary(){
    return $this->belongsTo(Questionary::class);
  }

}
