<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ArtistaCatalogo extends Model
{

    use Sluggable;

    protected $table='artista_catalogo';

    protected $fillable=[
    	'titulo', 
    	'descripcion',
    	'visitas',
    	'artista_id',
    	'status_id'
    ];

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function artista()
    {
        return $this->belongsTo('App\Artista');
    }

    public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina')->withTimestamps();
    }

    public function artistasCatalogosImagenes()
    {
        return $this->hasMany('App\ArtistaCatalogoImagen');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }
}
