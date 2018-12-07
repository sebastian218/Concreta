<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Zona;
use App\Rubro;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class UsuariosController extends Controller
{

    public function listadoTodos(){
      $usuarios = User::all();

      return view ('listado', compact('usuarios'));
    }

    public function home($id){
      $usuario = User::findOrFail($id);
      //Zona
      $zonas = $usuario->zonas;
      //RUBRO
      $rubros = $usuario->rubros;
      //Mensajes mensajesRecibidos
      $mensajesRecibidos = $usuario->mensajesRecibidos;
      //Foto
      //posteos

      return view('perfil_usuario', compact('usuario', 'zonas', 'rubros', 'mensajesRecibidos'));
    }

    public function mostrar($id){
      $usuario = User::findOrFail($id);
      //Zona
      //RUBRO
      //Foto
      //trabajos realizados
      $zonas = $usuario->zonas;
      //RUBRO
      $rubros = $usuario->rubros;
      return view('perfil_usuario', compact('usuario', 'zonas', 'rubros'));
    }

    public function guardarCambios(Request $req) {

// Automatically generate a unique ID for file name...
      //Storage::putFile('avatar', new File('/storage/app/public'));
// Manually specify a file name...
//Storage::putFileAs('avatar', new File('/storage/app/public'), $id'.jpg');
      $id = $req->identificador;
      $usuario = User::findOrFail($id);
      $zonas = $usuario->zonas;
      $rubros = $usuario->rubros;

      $avatar = $req->file('avatar');
      $usuario->guardarAvatar($avatar);
      return view('perfil_usuario', compact('usuario', 'zonas', 'rubros'));
    }


}
