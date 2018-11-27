<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Zona;
use App\Rubro;

class UsuariosController extends Controller
{
    //
    public function listadoTodos(){
      $usuarios = User::all();

      return view ('listado', compact('usuarios'));



    }


}
