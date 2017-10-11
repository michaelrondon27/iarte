<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedesSocialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redes_sociales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('red_social');
            $table->integer('icon_id')->unsigned();
            $table->foreign('icon_id')->references('id')->on('icons')->onDelete('restrict');
            $table->timestamps();
        });

        Schema::create('artista_red_social', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre');
            $table->integer('artista_id')->unsigned();
            $table->integer('red_social_id')->unsigned();
            $table->foreign('artista_id')->references('id')->on('artistas')->onDelete('cascade');
            $table->foreign('red_social_id')->references('id')->on('redes_sociales')->onDelete('restrict');
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
        Schema::drop('artista_red_social');
        Schema::dropIfExists('redes_sociales');
    }
}
