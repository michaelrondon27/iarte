<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistaCatalogo extends Model
{
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
        return $this->belongsToMany('App\Disciplina');
    }

    public function artistasCatalogosImagenes()
    {
        return $this->hasMany('App\ArtistaCatalogoImagen');
    }

}
