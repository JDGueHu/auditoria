<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarTablaAutoridadRequisitoLegal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoridad_requisito_legal', function (Blueprint $table) {
            $table->increments('id');

            $table->string('codigo')->nullable();
            $table->string('tipo_autoridad')->unique();

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
        Schema::dropIfExists('autoridad_requisito_legal');
    }
}
