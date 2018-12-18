<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Muro extends Model
{
    //
    public $table = "muro";
    public $primaryKey = 'id';
    public $guarded = [];

    public function usuario() {

      return $this->belongsTo('App\User', 'usuario_id');
    }
    public function zona() {

      return $this->belongsTo('App\Zona', 'zona_id');
    }

    public function rubro() {

      return $this->belongsTo('App\Rubro', 'rubro_id');
    }

    public function mostrarFotos(){

      $fotos = json_decode($this->foto,true);
      return $fotos;
    }


}
