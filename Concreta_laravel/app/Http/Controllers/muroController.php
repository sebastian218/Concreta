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
  $this->validate($req,
  ["zona_id" => "require",
  "rubro_id" => "require",
  "mensaje" => "require|string|max:149",
  "foto" => "require|image"]);

    $muro->zona_id = $req->zona;
    $muro->rubro_id = $req->rubro;
    $muro->mensaje = $req->text;
    $muro->foto= $req->file('foto');
    $muro->foto->store('public');
    $nombreArchivo = basename($path);
    $this->foto = $nombreArchivo;
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
