<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mensaje;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Calificacione;
use App\Muro;
use App\Especialidade;
use App\TrabajosRealizado;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

     public function trabajosRealizados(){

                return $this->hasMay('App\TrabajosRealizado', 'id_usuario');

     }

    public function zonas() {

      return $this->belongsToMany("App\Zona", "usuario_zona", "USUARIO_ID", "ZONA_ID");
    }
    public function posteo() {

      return $this->hasMany('App\Muro', 'usuario_id');
    }
    public function rubros() {

      return $this->belongsToMany('App\Rubro', 'usuario_rubro', 'USUARIO_ID', 'RUBRO_ID')->withPivot('orden');
    }

    public function especialidades() {

      return $this->belongsToMany('App\Especialidade', 'especialidades_usuarios', 'usuario_id', 'especialidad_id');
    }

    public function rubroPrincipal() {
      $rubros = $this->rubros;
      $principal = null;
      foreach ($rubros as $rubro) {
        if ($rubro->pivot->orden == 1) {
          $principal = $rubro;
        }
      }
      return $principal;
    }

    public function rubroSecundario() {
      $rubros = $this->rubros;
      $secundario = null;
      foreach ($rubros as $rubro) {
        if ($rubro->pivot->orden == 2) {
          $secundario = $rubro;
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
      return $this->hasMany('App\Calificacione', 'id_calificado');
    }

    public function promedio() {
      $numeros = [];
      $calificaciones = $this->calificaciones;
      foreach ($calificaciones as $calificacion) {
        $numeros[] = $calificacion['calificacion'];
      }
      if (count($numeros)!= 0) {
        $promedio = array_sum($numeros) / count($numeros);
        $promedioRound = round($promedio, 2);
        return  $promedioRound;
      }

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

    public function esTrabajador(){
      if ($this->esTrabajador == 0) {
        return true;
      }
      else {return false;}
    }

    public function scopeTrabajador($query) {
      return $query->where('esTrabajador', '1');
    }

    public function traerPosteosRubroP() {
      if ($this->rubroPrincipal()){
      $id_rubroP = $this->rubroPrincipal()->ID;
      $relacionados = Muro::all()->where('rubro_id', $id_rubroP);
      return $relacionados;
      }
      else {return Muro::all();}
    }

    public function traerPosteosRubroS() {
      if ($this->rubroSecundario()){
      $id_rubroP = $this->rubroSecundario()->ID;
      $relacionados = Muro::all()->where('rubro_id', $id_rubroP);
      return $relacionados;
      }
      else {return Muro::all();}
    }




}
