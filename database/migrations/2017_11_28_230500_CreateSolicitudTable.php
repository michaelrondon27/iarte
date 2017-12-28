<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('cedula');
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->string('correo');
            $table->text('direccion');
            $table->string('pueblo_indigena')->nullable();
            $table->string('idiomas')->nullable();
            $table->string('cursos')->nullable();
            $table->string('relacionados_actividad_artistica')->nullable();
            $table->string('tiempo_actividad_artistica')->nullable();
            $table->string('premio')->nullable();
            $table->string('grupo')->nullable();
            $table->string('tipo_grupo')->nullable();
            $table->string('activiades_educativas')->nullable();
            $table->string('apoyo_economico')->nullable();
            $table->string('empleo')->nullable();
            $table->string('sueldo')->nullable();
            $table->string('ingresos_artisticos')->nullable();
            $table->string('jubilado')->nullable();
            $table->string('pensionado')->nullable();
            $table->string('subsidio')->nullable();
            $table->integer('genero_id')->unsigned();
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('restrict');
            $table->integer('estado_civil_id')->unsigned();
            $table->foreign('estado_civil_id')->references('id')->on('estados_civiles')->onDelete('restrict');
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('restrict');
            $table->integer('grado_instruccion_id')->unsigned();
            $table->foreign('grado_instruccion_id')->references('id')->on('grados_instrucciones')->onDelete('restrict');
            $table->integer('tipo_premio_id')->unsigned()->nullable();
            $table->foreign('tipo_premio_id')->references('id')->on('tipos_premios')->onDelete('restrict');
            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('status')->onDelete('restrict');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->timestamps();
        });

        Schema::create('disciplina_solicitud', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('solicitud_id')->unsigned();
            $table->foreign('solicitud_id')->references('id')->on('solicitudes')->onDelete('cascade');
            $table->integer('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('solicitud_imagen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagen');
            $table->integer('solicitud_id')->unsigned();
            $table->foreign('solicitud_id')->references('id')->on('solicitudes')->onDelete('cascade');
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
        Schema::dropIfExists('solicitud_imagen');
        Schema::dropIfExists('disciplina_solicitud');
        Schema::dropIfExists('solicitudes');
    }
}
