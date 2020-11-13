<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
 */
  public function run() {
    //creamos el nuevo cuestionario
    Question::create([
      'question' => '¿Presenta Síntomas de Fiebre mayor o igual a 38 °C ?',
      'hasOptions' => 'Si',
      'options' => '["Si", "No"]',
      'isMultiple' => 'No',
      'hasObservation' => 'No',
      'questionary_id' => 1
    ]);
  }

}
