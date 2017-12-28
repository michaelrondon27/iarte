<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Museo extends Model
{

    use Sluggable;
    
    protected $table='museos';

    protected $fillable=[
    	'nombre',
    	'fecha_fundacion',
    	'foto',
    	'historia',
    	'direccion',
    	'telefono',
    	'correo',
    	'latitud',
    	'longitud',
    	'status_id',
        'estado_id',
        'contacto',
        'slug',
    ];

    public function users()
    {
    	return $this->belongsToMany('App\User')->withTimestamps();
    }

	public function artistas()
    {
    	return $this->belongsToMany('App\Artista')->withTimestamps();
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function tiposMuseos()
    {
    	return $this->belongsToMany('App\TipoMuseo')->withTimestamps();
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function museosDirectivos()
    {
        return $this->hasMany('App\MuseoDirectivo');
    }

    public function museosServicios()
    {
        return $this->hasMany('App\MuseoServicio');
    }

    public function museosImagenes()
    {
        return $this->hasMany('App\MuseoImagen');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }
}
