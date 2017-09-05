<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarTablaCentrosTrabajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centrosTrabajo', function (Blueprint $table) {
            $table->increments('id');

            $table->string('identificador');
            $table->string('centroTrabajo')->unique();

            $table->integer('nivelRiesgo_id')->unsigned();
            $table->foreign('nivelRiesgo_id')->references('id')->on('nivelRiesgos');

            $table->boolean('alive')->default(true);

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
        Schema::dropIfExists('centrosTrabajo');
    }
}
