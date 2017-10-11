<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedSocial extends Model
{
    protected $table='redes_sociales';

    protected $fillable=['red_social', 'icon_id'];

    public function icon()
    {
        return $this->belongsTo('App\Icon');
    }

    public function artistasRedesSociales()
    {
        return $this->hasMany('App\ArtistaRedSocial');
    }

}
