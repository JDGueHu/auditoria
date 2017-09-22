<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarTablaFormacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacion', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tipoEstudio'); // Si es formacion academica o complementaria
            $table->string('intExt')->nullable();  // Si es un estudio interno o externo

            $table->integer('nivelEstudio_id')->unsigned();
            $table->foreign('nivelEstudio_id')->references('id')->on('nivelesEstudio');

            $table->integer('areaEstudio_id')->unsigned();
            $table->foreign('areaEstudio_id')->references('id')->on('areasEstudio');

            $table->string('titulacion');
            $table->string('institucionEducativa');
            $table->string('estado');
            $table->date('fechaInicio');
            $table->date('fechaFin')->nullable();
            $table->string('ciudadEstudio');

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
        Schema::dropIfExists('formacion');
    }
}
