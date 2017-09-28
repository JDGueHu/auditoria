<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarTablaSST extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SST', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleados');

            $table->integer('tipoSST_id')->unsigned();
            $table->foreign('tipoSST_id')->references('id')->on('tiposSST');   

            $table->date('fechaSST');        
            
            $table->integer('causaPrincipal_id')->unsigned();
            $table->foreign('causaPrincipal_id')->references('id')->on('causasSSt');  

            $table->integer('causaComplementaria_id')->unsigned();
            $table->foreign('causaComplementaria_id')->references('id')->on('causasSSt'); 

            $table->string('detalles')->nullable();

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
        Schema::dropIfExists('SST');
    }
}
