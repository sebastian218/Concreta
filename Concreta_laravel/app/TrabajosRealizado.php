<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\user;

class TrabajosRealizado extends Model
{

  public $table = "TrabajosRealizados";
  public $primaryKey = 'id';
  public $guarded = [];

    public function usuario(){


        return  $this->belongsTo('App\User','id_usuario');

    }
}
