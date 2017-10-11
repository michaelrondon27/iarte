<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistaHabilidad extends Model
{
    protected $table='artista_habilidad';

    protected $fillable=[
    	'habilidad', 
    	'descripcion',
    	'artista_id',
    ];

    public function artista()
    {
        return $this->belongsTo('App\Artista');
    }
}
