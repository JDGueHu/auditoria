<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarTablaCentrosDeTrabajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros_trabajo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')

            $table->integer('riesgo_id')->unsigned();
            $table->foreign('riesgo_id')->references('id')->on('riesgos');

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
        Schema::dropIfExists('centros_trabajo');
    }
}
