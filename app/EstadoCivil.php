<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table='estados_civiles';

    protected $fillable=['estado_civil'];

    public function solicitudes()
    {
        return $this->hasMany('App\Solicitud');
    }
}
