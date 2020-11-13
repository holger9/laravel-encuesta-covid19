<?php

use Illuminate\Database\Seeder;
use App\Questionary;

class QuestionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
      //creamos el nuevo cuestionario
      Questionary::create([
        'name' => 'Seguimiento Diario Estado de Salud Covid 19',
        'status' => 'Activo',
        'user_id' => 1
      ]);
    }
}
