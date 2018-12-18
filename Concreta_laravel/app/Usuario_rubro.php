<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_rubro extends Model
{
  public $table = "usuario_rubro";
  public $primaryKey = "ID";
  public $timestamps = false;
  public $guarded = [];
}
