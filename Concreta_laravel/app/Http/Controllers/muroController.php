<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Zona;
use App\Rubro;
use App\Muro;

class muroController extends Controller
{
  public function guardarPosteo(Request $req){
    $muro = new Muro;
  //  $muro->usuario_id = $req->idUsuario;
    $muro->zona_id = $req->zona;
    $muro->rubro_id = $req->rubro;
    $muro->mensaje = $req->text;
    //  $foto = $req->foto;

    $muro->save();

    return redirect("/muro");


  }

  public function posteos(){
    $zonas=Zona::all();
    $rubros= Rubro::all();
    $posteos=Muro::paginate(5);

    $vac= compact('zonas','rubros','posteos');
    return view('muroPosteo',$vac);
  }
}
