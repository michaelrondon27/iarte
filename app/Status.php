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

}
