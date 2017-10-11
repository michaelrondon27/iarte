<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table='disciplinas';

    protected $fillable=['disciplina'];

    public function artistas()
    {
    	return $this->belongsToMany('App\Artista')->withTimestamps();
    }

    public function artitasCatalogos()
    {
    	return $this->belongsToMany('App\ArtistaCatalogo')->withTimestamps();
    }

}
