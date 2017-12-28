<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuseoServicio extends Model
{
    protected $table='museo_servicio';

    protected $fillable=[
    	'servicio',
    	'descripcion',
    	'museo_id',
    ];

    public function museo()
    {
    	return $this->belongsTo('App\Museo');
    }
}
