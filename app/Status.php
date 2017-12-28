<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table='status';

    protected $fillable=['status'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function artistas()
    {
        return $this->hasMany('App\Artista');
    }

    public function artistasCatalogos()
    {
        return $this->hasMany('App\ArtistaCatalogo');
    }

    public function artistasCatalogosImagenes()
    {
        return $this->hasMany('App\ArtistaCatalogoImagen');
    }

    public function museos()
    {
        return $this->hasMany('App\Museo');
    }

    public function museosImagenes()
    {
        return $this->hasMany('App\MuseoImagen');
    }

    public function noticias()
    {
        return $this->hasMany('App\Noticia');
    }

    public function solicitudes()
    {
        return $this->hasMany('App\Solicitud');
    }
}
