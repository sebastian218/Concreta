<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mensaje;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Calificacione;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USER_NAME', 'email', 'NOMBRE', 'APELLIDO', 'password', 'DNI', 'avatar'
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

    public function zonas() {

      return $this->belongsToMany("App\Zona", "usuario_zona", "USUARIO_ID", "ZONA_ID");
    }
    public function rubros() {

      return $this->belongsToMany('App\Rubro', 'usuario_rubro', 'USUARIO_ID', 'RUBRO_ID')->withPivot('orden');
    }

    public function rubroPrincipal() {
      $rubros = $this->rubros;
      foreach ($rubros as $rubro) {
        if ($rubro->pivot->orden == 1) {
          $principal = $rubro;
        }
      }
      return $principal;
    }

    public function rubroSecundario() {
      $rubros = $this->rubros;
      foreach ($rubros as $rubro) {
        if ($rubro->pivot->orden == 2) {
          $secundario = $rubro;
        }
        else {
          return null;
        }
      }
      return $secundario;
    }


    public function mensajesEnviados() {

      return $this->hasMany('App\Mensaje', 'USER_ID_1');
    }

    public function mensajesRecibidos() {
      return $this->hasMany('App\Mensaje', 'USER_ID_2');
    }

    public function nombre_avatar(){
      return $this->avatar;
    }

    public function calificaciones() {
      return $this->hasMany('App\Calificacione', 'calificado');
    }

    public function promedio() {
      $numeros = [];
      $calificaciones = $this->calificaciones;
      foreach ($calificaciones as $calificacion) {
        $numeros[] = $calificacion['calificacion'];
      }
      $promedio = array_sum($numeros) / count($numeros);
      return  $promedio;
    }

    public function promedioInt() {
      $promedio = $this->promedio();
      $redondeado = round($promedio);
      return $redondeado;
    }

    public function cantCalif() {
      $numeros = [];
      $calificaciones = $this->calificaciones;
      foreach ($calificaciones as $calificacion) {
        $numeros[] = $calificacion['calificacion'];
      }
      $cant = count($numeros);
      return  $cant;
    }

    public function guardarAvatar($avatar){

      $path = $avatar->store('public');
      $nombreArchivo = basename($path);

      $this->avatar = $nombreArchivo;
      $this->save();
    }


}
