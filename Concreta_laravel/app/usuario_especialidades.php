<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rubro;
use App\Especialidade;
use App\User;

class usuario_especialidades extends Model
{
  public $table = 'especialidades_usuarios';
  public $timestamps = false;
  public $guarded = [];
    //
}
