<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('idalumno');
            $table->integer('codeducando')->unique();;
            $table->integer('dni')->unique();;
            $table->string('apellidopaterno');
            $table->string('apellidomaterno');
            $table->string('primernombres');
            $table->string('otrosnombres');
            $table->string('sexo');
            $table->date('fechanacimiento');
            $table->integer('iddepartamento')->unsigned()->index();
            $table->string('escala');
            $table->integer('anioingreso');
            
        });

        Schema::table('alumnos', function (Blueprint $table) {
            $table->foreign('iddepartamento')->references('iddepartamento')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
