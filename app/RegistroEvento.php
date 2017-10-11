<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroEvento extends Model
{
    protected $table='registros_eventos';

    protected $fillable=[
    	'evento',
    	'ip',
    	'operacion',
    	'usuario'
    ];
}
