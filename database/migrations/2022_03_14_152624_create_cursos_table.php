<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('idcurso');
            $table->string('nombrecu');
            $table->string('codcurso')->unique();
            $table->integer('idnivel')->unsigned()->index();
            
        });
        Schema::table('cursos', function (Blueprint $table) {
            $table->foreign('idnivel')->references('idnivel')->on('nivels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
