<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
  */
  public function up() {
    Schema::create('users', function (Blueprint $table) {
      $table->engine = "InnoDB";
      $table->id();
      $table->integer('identification')->unique();
      $table->string('fullname', 30);
      $table->string('first_surname', 30);
      $table->string('second_surname', 30);
      $table->string('email', 40)->unique();
      $table->enum('gender', ['Masculino', 'Femenino']);
      $table->string('employment', 60);
      $table->string('cellphone_number', 20);
      $table->string('password', 255);
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
    * Reverse the migrations.
    *
    * @return void
  */
  public function down() {
    Schema::dropIfExists('users');
  }
  
}
