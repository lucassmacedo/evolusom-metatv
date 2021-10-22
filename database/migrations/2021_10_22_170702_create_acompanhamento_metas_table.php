<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcompanhamentoMetasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('acompanhamento_metas', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('vendedor');
      $table->string('nome');
      $table->string('mes', 2);
      $table->string('ano', 4);
      $table->boolean("ultima_mostrada")->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('acompanhamento_metas');
  }
}
