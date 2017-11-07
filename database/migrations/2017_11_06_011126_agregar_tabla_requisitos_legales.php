<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarTablaRequisitosLegales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitos_legales', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('tipo_requisito_legal_id')->unsigned();
            $table->foreign('tipo_requisito_legal_id')->references('id')->on('tipo_requisito_legal');

            $table->string('numero_fecha');
            $table->boolean('sst')->default(false);
            $table->boolean('amb')->default(false);
            $table->boolean('cal')->default(false);
            $table->boolean('cult')->default(false);
            $table->boolean('tur')->default(false);
            $table->boolean('eco')->default(false);
            $table->boolean('otr')->default(false);
            $table->string('articulo');

            $table->integer('autoridad_requisito_legal_id')->unsigned();
            $table->foreign('autoridad_requisito_legal_id')->references('id')->on('autoridad_requisito_legal');

            $table->string('contenido',3000);
            $table->string('estado')->default('Vigente');
            $table->string('cumplimiento');
            $table->string('evidencia_cumplimiento',2000);
            $table->string('responsable');
            $table->string('plan_accion',3000);

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
        Schema::dropIfExists('requisitos_legales');
    }
}
