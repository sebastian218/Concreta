<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Zona;
use App\Rubro;
use App\Muro;

class muroController extends Controller
{

  public function guardarPosteo(Request $req){



    $muro = new Muro;
  $muro->usuario_id = $req->idUsuario;
  $this->validate($req,
  ["zona" => "required",
  "rubro" => "required",
  "text" => "required|string|max:149",
  "fotos" => "required"]);

    $muro->zona_id = $req->zona;
    $muro->rubro_id = $req->rubro;
    $muro->mensaje = $req->text;

    $paths = [];
    foreach ($req->fotos as $foto) {
       $paths[] = $foto->store('public');
    }
    $nombreArchivos = [];
    foreach ($paths as $path) {
      $nombreArchivos[] = basename($path);
    }

    $fotosJson = json_encode($nombreArchivos);
    $muro->foto= $fotosJson;

    $muro->save();


    return redirect("/muro");


  }

  public function posteos(){
    $zonas=Zona::all();
    $rubros= Rubro::all();
    $posteos=Muro::orderBy('id',"desc")->paginate(5);

    $vac= compact('zonas','rubros','posteos');
    return view('muroPosteo',$vac);
  }
  

}
