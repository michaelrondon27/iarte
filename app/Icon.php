<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $table='icons';

    protected $fillable=['icon', 'name'];

    public function RedesSociales()
    {
        return $this->hasMany('App\RedSocial');
    }
}
