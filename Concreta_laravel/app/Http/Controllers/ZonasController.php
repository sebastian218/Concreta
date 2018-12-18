<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zona;

class ZonasController extends Controller
{
  public function listadoTodos(){
    $zonas = Zona::all();

    return view ('listado', compact('zonas'));
    //
}
