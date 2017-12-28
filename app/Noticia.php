<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Noticia extends Model
{

    use Sluggable;


    protected $table='noticias';

    protected $fillable=[
    	'titulo',
    	'imagen',
    	'contenido',
        'status_id'
    ];

	public function etiquetas()
    {
    	return $this->belongsToMany('App\Etiqueta')->withTimestamps();
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }
    
}
