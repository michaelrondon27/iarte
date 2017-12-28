<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table='estados';

    protected $fillable=['estado'];

    public function museos()
    {
        return $this->hasMany('App\Museo');
    }

    public function solicitudes()
    {
        return $this->hasMany('App\Solicitud');
    }
}
