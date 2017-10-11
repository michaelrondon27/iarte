<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table='generos';

    protected $fillable=['genero'];

    public function artistas()
    {
        return $this->hasMany('App\Artista');
    }
}
