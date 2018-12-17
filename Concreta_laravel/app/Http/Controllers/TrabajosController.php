<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TrabajosRealizado;

class TrabajosController extends Controller
{
    public function guardarNuevoTrabajo(Request $req){

        $id = $req->identificador;

       $trabajoNuevo = new TrabajosRealizado ;


       $trabajoNuevo->descripcion = $req->textoTrabajo;
       $trabajoNuevo->id_usuario = $req->identificador;

        $paths = [];
        foreach ($req->fotosTrabajos as $foto) {
           $paths[] = $foto->store('public');
        }
        $nombreArchivos = [];
        foreach ($paths as $path) {
          $nombreArchivos[] = basename($path);
        }
      $fotosJson = json_encode($nombreArchivos);

      $trabajoNuevo->fotos = $fotosJson;

      $trabajoNuevo->save();

      return redirect("/perfil/log/" . $id)->with([
        "status" => "Los cambios se actualizaron correctamente!"
      ]);

    }
}
