<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPremio extends Model
{
    protected $table='tipos_premios';

    protected $fillable=['tipo_premio'];

    public function solicitudes()
    {
        return $this->hasMany('App\Solicitud');
    }
}
