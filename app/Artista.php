<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Artista extends Model
{

    use Sluggable;

    protected $table='artistas';

    protected $fillable=[
    	'nombre', 
    	'fecha_nacimiento',
    	'fecha_muerte',
    	'telefono',
    	'direccion',
    	'biografia',
        'status_id',
    	'genero_id',
    	'pais_nacimiento_id',
    	'pais_muerte_id',
        'tipo'
    ];

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function genero()
    {
        return $this->belongsTo('App\Genero');
    }

    public function pais()
    {
        return $this->belongsTo('App\Pais');
    }

    public function profesiones()
    {
        return $this->belongsToMany('App\Profesion')->withTimestamps();
    }
    
    public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function artistasCatalogos()
    {
        return $this->hasMany('App\ArtistaCatalogo');
    }

    public function artistasRedesSociales()
    {
        return $this->hasMany('App\ArtistaRedSocial');
    }

    public function artistasHabilidades()
    {
        return $this->hasMany('App\ArtistaHabilidad');
    }

    public function museos()
    {
        return $this->belongsToMany('App\Museo')->withTimestamps();
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
