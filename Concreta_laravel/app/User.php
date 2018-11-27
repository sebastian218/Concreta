<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'USER_NAME', 'email', 'NOMBRE', 'APELLIDO', 'password', 'DNI'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $table = "users";
    public $primaryKey = "ID";
    public $timestamps = false;

    public function zona() {

      return $this->belongsToMany("App\Zona", "usuario_zona", "USUARIO_ID", "ZONA_ID");
    }
    public function rubro() {

      return $this->belongsToMany('App\Rubro', 'usuario_rubro', 'USUARIO_ID', 'RUBRO_ID');
    }

}
