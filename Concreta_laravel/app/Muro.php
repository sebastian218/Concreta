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

    public function guardarFoto($foto){
      $path = $foto->store('public');
      $nombreArchivo = basename($path);
      $this->foto = $nombreArchivo;
      $this->save();
    }
    public function guardarFotos($foto1,$foto2,$foto3){

    $path1= $foto1->store('public');
    $nombreArchivo1 = basename($path1);

    $path2= $foto2->store('public');
    $nombreArchivo2= basename($path2);

    $path3= $foto3->store('public');
    $nombreArchivo3= basename($path3);

     $this->foto = json_encode($nombreArchivo1,$nombreArchivo2,$nombreArchivo3);
     $this->save();
   }
}
