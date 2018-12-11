<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rubro;

class Especialidade extends Model
{
  public $timestamps = false;
  public $guarded = [];
  public $table = 'especialidades';

  public function rubro() {
    return $this->belongsTo('App\Rubro', 'id_rubro');
  }
  public function nombre(){
    return $this->nombre;
  }
  public function usuarios(){
    return $this->BelongsToMany('App\User', 'especialidades_usuario', 'especialidad_id', 'usuario_id');
  }

  public function estaEn($coleccion){
    $id = $this->ID;
    return $coleccion->contains('ID', $id);
  }
}
