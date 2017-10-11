<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table='paises';

    protected $fillable=['pais'];

    public function artistas()
    {
        return $this->hasMany('App\Artista');
    }
}
