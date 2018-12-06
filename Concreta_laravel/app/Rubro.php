<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rubro;

class Rubro extends Model
{
    //
    public $timestamps = false;
    public $guarded = [];

    public function usuariosRubro() {

      return $this->belongsToMany('App\User', 'usuario_rubro', 'RUBRO_ID', 'USUARIO_ID')->withPivot('orden');
    }



}
