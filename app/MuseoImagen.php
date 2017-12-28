<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuseoImagen extends Model
{
    protected $table='museo_imagen';

    protected $fillable=[
    	'imagen',
    	'titulo',
        'artista_id',
        'reseña',
    ];

    public function museo()
    {
    	return $this->belongsTo('App\Museo');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function artista()
    {
        return $this->belongsTo('App\Artista');
    }
}
