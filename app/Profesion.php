<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    protected $table='profesiones';

    protected $fillable=['profesion'];

    public function artistas()
    {
    	return $this->belongsToMany('App\Artista')->withTimestamps();
    }
}
