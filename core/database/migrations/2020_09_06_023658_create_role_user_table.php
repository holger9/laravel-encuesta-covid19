<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration {
  /**
    * Run the migrations.
    *
    * @return void
  */
  public function up() {
    Schema::create('role_user', function (Blueprint $table) {
      $table->engine = "InnoDB";
      $table->id();
      $table->foreignId('role_id')->references('id')->on('roles')->onDelete('CASCADE')->onUpdate('CASCADE');
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
    Schema::dropIfExists('role_user');
  }

}
