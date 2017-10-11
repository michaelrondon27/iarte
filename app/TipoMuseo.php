<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMuseo extends Model
{
    protected $table='tipos_museos';

    protected $fillable=['tipo_museo'];
}
