<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table='perfiles';

    protected $fillable=['perfil'];

    public function users()
    {
    	return $this->belongsToMany('App\User')->withTimestamps();
    }
}
