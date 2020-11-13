<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration {
  /**
    * Run the migrations.
    *
    * @return void
  */
  public function up() {
    Schema::create('roles', function (Blueprint $table) {
      $table->engine = "InnoDB";
      $table->id();
      $table->string('name', 20)->unique();
      $table->string('description')->nullable();
      $table->enum('full-access', ['Si', 'No'])->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
  */
  public function down() {
    Schema::dropIfExists('roles');
  }

}
