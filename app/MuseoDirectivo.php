<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuseoDirectivo extends Model
{
    protected $table='museo_directivo';

    protected $fillable=[
    	'nombre',
    	'foto',
    	'museo_id',
    	'cargo_id',
    ];

    public function museo()
    {
    	return $this->belongsTo('App\Museo');
    }

	public function cargo()
    {
    	return $this->belongsTo('App\Cargo');
    }

}
