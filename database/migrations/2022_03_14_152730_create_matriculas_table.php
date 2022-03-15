<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->increments('idmatricula');
            $table->integer('idalumno')->unsigned()->index()->unique();
            $table->integer('idnivel')->unsigned()->index();
            $table->integer('idperiodo')->unsigned()->index();
            $table->date('fechamatricula');
            
        });
        Schema::table('matriculas', function (Blueprint $table) {
            $table->foreign('idnivel')->references('idnivel')->on('nivels')->onDelete('cascade');
        });
        Schema::table('matriculas', function (Blueprint $table) {
            $table->foreign('idalumno')->references('idalumno')->on('alumnos')->onDelete('cascade');
        }); 
        Schema::table('matriculas', function (Blueprint $table) {
            $table->foreign('idperiodo')->references('idperiodo')->on('periodos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
