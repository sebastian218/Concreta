<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mensaje;
use Carbon\Carbon;

class MensajesController extends Controller
{
    public function guardarMensaje(Request $req) {
      $men = new Mensaje;

      if ($req->mensaje) {
        $men->MENSAJE = $req->mensaje;
      }
      else{
        $men->MENSAJE = "-";
      }
      $men->USER_ID_1 = $req->id_emisor;
      $men->USER_ID_2 = $req->id_receptor;
      $men->FECHA_INIT = new Carbon();

      $men->save();

      return redirect("/buscador")->with([
        "status" => "Mensaje enviado!"
      ]);

    }
}
