<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rubro;
use App\Especialidade;
use App\User;

class Rubro extends Model
{
    //
    public $primaryKey = 'ID';
    public $timestamps = false;
    public $guarded = [];

    public function usuariosRubro() {

      return $this->belongsToMany('App\User', 'usuario_rubro', 'RUBRO_ID', 'USUARIO_ID')->withPivot('orden');
    }

    public function especialidades() {

      return $this->hasMany('App\Especialidade', 'id_rubro');
    }

}
