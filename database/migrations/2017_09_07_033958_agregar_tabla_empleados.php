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
            $table->foreign('tipoDocumento_id')->references('id')->on('tiposDocumento');

            $table->string('identificacion')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('genero');
            $table->string('grupoSanguineo');
            $table->date('fechaNacimiento');
            $table->string('ciudadNacimiento');
            $table->string('departamentoNacimiento')->nullable();
            $table->string('paisNacimiento')->nullable();
            $table->string('estadoCivil');
            $table->integer('numeroHijos')->nullable();
            $table->string('ciudadDireccion');
            $table->string('departamentoDireccion')->nullable();
            $table->string('paisDireccion')->nullable();
            $table->string('direccion');
            $table->string('emailPersonal');
            $table->string('telefonoFijo')->nullable();
            $table->string('telefonoCelular');
            $table->date('fechaIngreso');
            $table->string('emailCorporativo')->nullable();

            $table->integer('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('id')->on('cargos');        

            $table->string('eps')->nullable();
            $table->string('arl')->nullable();
            $table->string('fondoPensiones')->nullable();
            $table->string('fondoCesantias')->nullable();

            $table->integer('centro_trabajo_id')->unsigned();
            $table->foreign('centro_trabajo_id')->references('id')->on('centrosTrabajo'); 

            $table->string('estado');
            $table->date('fechaRetiro')->nullable();

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
        Schema::dropIfExists('empleados');
    }
}
