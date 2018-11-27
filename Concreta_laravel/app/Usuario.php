<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{

    public $primaryKey = "ID";
    public $timestamps = false;
    public $guarded = [];

    public function zona() {

      return $this->belongsToMany("App\Zona", "usuario_zona", "USUARIO_ID", "ZONA_ID");
    }
    public function rubro() {

      return $this->belongsToMany('App\Rubro', 'usuario_rubro', 'USUARIO_ID', 'RUBRO_ID');
    }
}
