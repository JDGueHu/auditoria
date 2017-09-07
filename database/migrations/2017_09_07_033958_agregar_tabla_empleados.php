<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarTablaEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('tipoDocumento_id')->unsigned();
            $table->foreign('identificacion')->references('id')->on('tiposDocumento');

            $table->string('tipoDocumento')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('genero');
            $table->string('grupoSanguineo');
            $table->date('fechaNacimiento');
            $table->string('ciudadNacimiento');
            $table->string('departamentoNacimiento');
            $table->string('paisNacimiento');
            $table->string('estadoCivil');
            $table->integer('numeroHijos')->nullable();




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
        Schema::dropIfExists('empleados');
    }
}
