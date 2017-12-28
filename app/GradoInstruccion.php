<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradoInstruccion extends Model
{
    protected $table='grados_instrucciones';

    protected $fillable=['grado_instruccion'];

    public function solicitudes()
    {
        return $this->hasMany('App\Solicitud');
    }
}
