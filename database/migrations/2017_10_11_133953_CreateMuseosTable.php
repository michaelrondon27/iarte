<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMuseosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('museos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->date('fecha_fundacion')->default('2000-01-01');
            $table->string('foto')->default('default.jpg');
            $table->text('historia');
            $table->text('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('contacto')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->integer('visitas')->default(0);
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('restrict');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status')->onDelete('restrict');
            $table->string('portada')->default('1.jpg');
            $table->string('bg_historia')->default('42.jpg');
            $table->string('bg_servicios')->default('10.jpg');
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        Schema::create('museo_tipo_museo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('museo_id')->unsigned();
            $table->foreign('museo_id')->references('id')->on('museos')->onDelete('cascade');
            $table->integer('tipo_museo_id')->unsigned();
            $table->foreign('tipo_museo_id')->references('id')->on('tipos_museos')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('museo_imagen', function (Blueprint $table) {
            $table->increments('id');
            $table->text('imagen');
            $table->string('titulo');
            $table->text('reseña')->nullable();
            $table->integer('visitas')->default(0);
            $table->integer('museo_id')->unsigned()->nullable();
            $table->foreign('museo_id')->references('id')->on('museos')->onDelete('cascade');
            $table->integer('artista_id')->unsigned();
            $table->foreign('artista_id')->references('id')->on('artistas')->onDelete('restrict');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status')->onDelete('restrict');
            $table->timestamps();
        });

        Schema::create('artista_museo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('museo_id')->unsigned();
            $table->foreign('museo_id')->references('id')->on('museos')->onDelete('cascade');
            $table->integer('artista_id')->unsigned();
            $table->foreign('artista_id')->references('id')->on('artistas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('museo_directivo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('foto')->default('default.jpg');
            $table->integer('museo_id')->unsigned();
            $table->foreign('museo_id')->references('id')->on('museos')->onDelete('cascade');
            $table->integer('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('restrict');
            $table->timestamps();
        });

        Schema::create('museo_servicio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('servicio');
            $table->text('descripcion');
            $table->integer('museo_id')->unsigned();
            $table->foreign('museo_id')->references('id')->on('museos')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('museo_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('museo_id')->unsigned();
            $table->foreign('museo_id')->references('id')->on('museos')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('museo_user');
        Schema::dropIfExists('museo_servicio');
        Schema::dropIfExists('museo_directivo');
        Schema::dropIfExists('museo_artista');
        Schema::dropIfExists('museo_imagen');
        Schema::dropIfExists('museo_tipo_museo');
        Schema::dropIfExists('museos');
    }
}
