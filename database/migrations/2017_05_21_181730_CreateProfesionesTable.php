<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesiones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('profesion');
            $table->timestamps();
        });

        Schema::create('artista_profesion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artista_id')->unsigned();
            $table->integer('profesion_id')->unsigned();
            $table->foreign('artista_id')->references('id')->on('artistas')->onDelete('cascade');
            $table->foreign('profesion_id')->references('id')->on('profesiones')->onDelete('cascade');
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
        Schema::drop('artista_profesion');
        Schema::dropIfExists('profesiones');
    }
}
