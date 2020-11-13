<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoleTable extends Migration {
  /**
    * Run the migrations.
    *
    * @return void
  */
  public function up() {
    Schema::create('permission_role', function (Blueprint $table) {
      $table->engine = "InnoDB";
      $table->id();
      $table->foreignId('role_id')->references('id')->on('roles')->onDelete('CASCADE')->onUpdate('CASCADE');
      $table->foreignId('permission_id')->references('id')->on('permissions')->onDelete('CASCADE')->onUpdate('CASCADE');
      $table->timestamps();
    });
  }

  /**
    * Reverse the migrations.
    *
    * @return void
  */
  public function down() {
    Schema::dropIfExists('permission_role');
  }
  
}
