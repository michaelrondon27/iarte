<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table='solicitudes';

    protected $fillable=[
    	'nombres',
    	'apellidos',
    	'cedula',
    	'fecha_nacimiento',
    	'telefono',
    	'correo',
    	'direccion',
    	'genero_id',
    	'estado_civil_id',
    	'estado_id',
    	'grado_instruccion_id',
    ];

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function estadoCivil()
    {
        return $this->belongsTo('App\EstadoCivil');
    }

    public function genero()
    {
        return $this->belongsTo('App\Genero');
    }

    public function gradoInstruccion()
    {
        return $this->belongsTo('App\GradoInstruccion');
    }

    public function tipoPremio()
    {
        return $this->belongsTo('App\TipoPremio');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina')->withTimestamps();
    }

    public function solicitudImagenes()
    {
        return $this->hasMany('App\SolicitudImagen');
    }
}
