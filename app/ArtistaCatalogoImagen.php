<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistaCatalogoImagen extends Model
{
    protected $table='artista_catalogo_imagen';

    protected $fillable=[
    	'imagen', 
        'nombre', 
    	'descripcion',
    	'artista_catalogo_id',
    	'status_id'
    ];

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function artistaCatalogo()
    {
        return $this->belongsTo('App\ArtistaCatalogo');
    }

}
