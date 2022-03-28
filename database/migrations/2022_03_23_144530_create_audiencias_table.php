<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audiencias', function (Blueprint $table) {
            $table->id();
            $table->string('ruc', 12)->nullable();
            $table->string('fiscal', 100)->nullable();
            $table->string('fiscalia', 100)->nullable();
            $table->string('direccion_delito', 100)->nullable();
            $table->string('comuna_delito', 50)->nullable();
            $table->integer('nro_parte')->nullable();
            $table->dateTime('fec_parte', $precision = 0)->nullable();
            $table->text('hechos')->nullable();
            $table->string('comisaria', 80)->nullable();
            $table->string('fun_denuncia', 50)->nullable();
            $table->dateTime('fec_recepcion', $precision = 0)->nullable();
            $table->dateTime('fec_hecho', $precision = 0)->nullable();
            $table->string('username', 25)->nullable();
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
        Schema::dropIfExists('audiencias');
    }
}
