<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    
    protected $table='etiquetas';

    protected $fillable=['etiqueta'];

    public function noticias()
    {
    	return $this->belongsToMany('App\Noticia')->withTimestamps();
    }
}
