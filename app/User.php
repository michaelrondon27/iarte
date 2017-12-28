<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function perfiles()
    {
        return $this->belongsToMany('App\Perfil');
    }
    
    public function artistas()
    {
        return $this->belongsToMany('App\Artista')->withTimestamps();
    }

    public function museos()
    {
        return $this->belongsToMany('App\Museo')->withTimestamps();
    }

    public function noticias()
    {
        return $this->hasMany('App\Noticia');
    }

    public function solicitudes()
    {
        return $this->hasMany('App\Solicitud');
    }
}
