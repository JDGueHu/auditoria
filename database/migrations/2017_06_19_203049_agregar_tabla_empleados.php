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

            $table->boolean("estado")->default(true);

            $table->integer('tipo_identificacion_id')->unsigned();
            $table->foreign('tipo_identificacion_id')->references('id')->on('tipos_identificacion');

            $table->integer("identificacion")->unique();
            $table->string("nombres");
            $table->string("apellidos");
            $table->string("grupo_sanguineo");
            $table->string("rh");
            $table->string("sexo");
            $table->string("estado_civil");
            $table->date("fecha_nacimiento");
            $table->integer("numero_hijos")->nullable();

            $table->integer('departamento_nacimiento_id')->unsigned();
            $table->foreign('departamento_nacimiento_id')->references('id')->on('zonas');

            $table->integer('ciudad_nacimiento_id')->unsigned();
            $table->foreign('ciudad_nacimiento_id')->references('id')->on('zonas');

            $table->date("fecha_ingreso");

            $table->integer('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('id')->on('cargos');

            $table->string("email_corporativo")->nullable();
            $table->string("email_personal");
            $table->string("telefono_fijo")->nullable();
            $table->string("telefono_celular");

            $table->boolean("examen_ingreso");
            $table->date("fecha_examen_ingreso");
            $table->string("restricciones_medicas")->nullable();
            $table->string("concepto")->nullable();
            $table->string("tipo_contrato");
            $table->string("eps");
            $table->string("arl");
            $table->string("fondo_pensiones");
            $table->string("fondo_cesantias");
    
            $table->date("fecha_retiro")->nullable();
            $table->boolean("examen_retiro");
            $table->date("fecha_examen_retiro");

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
