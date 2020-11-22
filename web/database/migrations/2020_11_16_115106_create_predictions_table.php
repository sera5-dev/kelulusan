<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('predictions', function (Blueprint $table) {
      $table->id();
      $table->string('nama');
      $table->string('jenis_kelamin');
      $table->string('status_mahasiswa');
      $table->string('umur');
      $table->string('status_nikah');
      $table->string('ips1');
      $table->string('ips2');
      $table->string('ips3');
      $table->string('ips4');
      $table->string('ips5');
      $table->string('ips6');
      $table->string('ips7');
      $table->string('ips8');
      $table->string('ipk');
      $table->string('status_kelulusan');
      $table->integer('validated')->default(1);
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
    Schema::dropIfExists('predictions');
  }
}
