<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration {
  /**
    * Run the migrations.
    *
    * @return void
  */
  public function up() {
    Schema::create('questions', function (Blueprint $table) {
      $table->engine = "InnoDB";
      $table->id();
      $table->text('question');
      $table->enum('hasOptions', ['Si', 'No']);
      $table->json('options');
      $table->enum('isMultiple', ['Si', 'No']);
      $table->enum('hasObservation', ['Si', 'No']);
      $table->foreignId('questionary_id')->references('id')->on('questionaries')->onDelete('CASCADE')->onUpdate('CASCADE');
      $table->timestamps();
    });
  }

  /**
    * Reverse the migrations.
    *
    * @return void
  */
  public function down() {
    Schema::dropIfExists('questions');
  }

}
