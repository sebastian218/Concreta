<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    public $primaryKey = "ID";
    public $timestamps = false;
    public $guarded = [];

    public function usuariosZona() {

      return $this->belongsToMany("App\User", "usuario_zona", "ZONA_ID", "USUARIO_ID");
    }

    public function todas(){
      return Zona::all();
    }
}
