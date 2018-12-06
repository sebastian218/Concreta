<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
  public $primaryKey = "ID";
  public $timestamps = false;
  public $guarded = [];

  public function emisor(){
    return $this->belongsTo('App\User', 'USER_ID_1');
    //$userid = $this->USER_ID_1;
    //$usuario = User::find($userid);
    //return $usuario;
  }
  public function receptor(){
    return $this->belongsTo('App\User', 'USER_ID_2');
    //$userid = $this->USER_ID_2;
    //$usuario = User::find($userid);
    //return $usuario;
  }
  

}
