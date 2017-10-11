<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistaRedSocial extends Model
{
    protected $table='artista_red_social';

    protected $fillable=[
    	'nombre', 
    	'red_social_id',
    	'artista_id',
    ];

    public function artista()
    {
        return $this->belongsTo('App\Artista');
    }

    public function redSocial()
    {
        return $this->belongsTo('App\RedSocial');
    }

}
