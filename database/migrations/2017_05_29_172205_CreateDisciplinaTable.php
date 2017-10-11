<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('disciplina');
            $table->timestamps();
        });

        Schema::create('artista_disciplina', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artista_id')->unsigned();
            $table->integer('disciplina_id')->unsigned();
            $table->foreign('artista_id')->references('id')->on('artistas')->onDelete('cascade');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('artista_catalogo_disciplina', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artista_catalogo_id')->unsigned();
            $table->foreign('artista_catalogo_id')->references('id')->on('artista_catalogo')->onDelete('cascade');
            $table->integer('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
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
        Schema::dropIfExists('artista_catalogo_disciplina');
        Schema::dropIfExists('artista_disciplina');
        Schema::dropIfExists('disciplinas');
    }
}
