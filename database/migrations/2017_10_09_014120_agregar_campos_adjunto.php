<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarCamposAdjunto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('contratos', function (Blueprint $table) {
           $table->string('adjunto')->nullable();           
        });

        Schema::table('formaciones', function (Blueprint $table) {
           $table->string('adjunto')->nullable();           
        });

        Schema::table('examenes', function (Blueprint $table) {
           $table->string('adjunto')->nullable();           
        });

        Schema::table('vacaciones', function (Blueprint $table) {
           $table->string('adjunto')->nullable();           
        });

        Schema::table('SST', function (Blueprint $table) {
           $table->string('adjunto')->nullable();           
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
