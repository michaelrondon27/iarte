<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudImagen extends Model
{
    protected $table='solicitud_imagen';

    protected $fillable=[
    	'imagen',
    	'solicitud_id',
    ];

    public function solicitud()
    {
        return $this->belongsTo('App\Solicitud');
    }
}
