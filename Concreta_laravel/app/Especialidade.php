<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
  public $timestamps = false;
  public $guarded = [];

  public function rubro(){

    return $this->belongsTo('App\Rubro', 'id_rubro');
  }
}
