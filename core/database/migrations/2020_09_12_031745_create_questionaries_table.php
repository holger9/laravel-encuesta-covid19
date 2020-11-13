<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionariesTable extends Migration {
  /**
    * Run the migrations.
    *
    * @return void
  */
  public function up() {
    Schema::create('questionaries', function (Blueprint $table) {
      $table->engine = "InnoDB";
        $table->id();
        $table->string('name', 70);
        $table->enum('status', ['Activo', 'Inactivo']);
        $table->foreignId('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        $table->timestamps();
    });
  }

  /**
    * Reverse the migrations.
    *
    * @return void
  */
  public function down() {
    Schema::dropIfExists('questionaries');
  }
  
}
