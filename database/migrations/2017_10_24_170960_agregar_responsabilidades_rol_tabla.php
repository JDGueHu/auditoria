<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarResponsabilidadesRolTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsabilidades_rol', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('roles_matriz');

            $table->string('responsabilidad');
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
        Schema::dropIfExists('responsabilidades_rol');
    }
}
