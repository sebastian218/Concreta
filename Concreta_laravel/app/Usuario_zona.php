<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_zona extends Model
{
  public $table = "usuario_zona";
  public $primaryKey = "ID";
  public $timestamps = false;
  public $guarded = [];
}
