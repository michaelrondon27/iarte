<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artistas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->date('fecha_nacimiento');
            $table->date('fecha_muerte')->nullable();
            $table->string('telefono')->nullable();
            $table->text('direccion')->nullable();
            $table->text('biografia');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status')->onDelete('restrict');
            $table->integer('genero_id')->unsigned();
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('restrict');
            $table->integer('pais_nacimiento_id')->unsigned();
            $table->foreign('pais_nacimiento_id')->references('id')->on('paises')->onDelete('restrict');
            $table->integer('pais_muerte_id')->unsigned()->nullable();
            $table->foreign('pais_muerte_id')->references('id')->on('paises')->onDelete('restrict');
            $table->enum('tipo', [0, 1]);
            $table->string('foto')->default('default.jpg');
            $table->string('portada')->default('1.jpg');
            $table->string('bg_biografia')->default('42.jpg');
            $table->string('bg_habilidades')->default('10.jpg');
            $table->integer('visitas')->default(0);
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        Schema::create('artista_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artista_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('artista_id')->references('id')->on('artistas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('artista_catalogo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('descripcion');
            $table->integer('visitas')->default(0);
            $table->string('slug')->nullable();
            $table->integer('artista_id')->unsigned();
            $table->foreign('artista_id')->references('id')->on('artistas')->onDelete('cascade');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status')->onDelete('restrict');
            $table->timestamps();
        });

        Schema::create('artista_catalogo_imagen', function (Blueprint $table) {
            $table->increments('id');
            $table->text('imagen');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->integer('artista_catalogo_id')->unsigned();
            $table->foreign('artista_catalogo_id')->references('id')->on('artista_catalogo')->onDelete('cascade');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status')->onDelete('restrict');
            $table->timestamps();
        });

        Schema::create('artista_habilidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('habilidad');
            $table->text('descripcion');
            $table->integer('artista_id')->unsigned();
            $table->foreign('artista_id')->references('id')->on('artistas')->onDelete('cascade');
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
        Schema::dropIfExists('artista_habilidad');
        Schema::dropIfExists('artista_catalogo_imagen');
        Schema::dropIfExists('artista_catalogo');
        Schema::dropIfExists('artista_user');
        Schema::dropIfExists('artistas');
    }
}
