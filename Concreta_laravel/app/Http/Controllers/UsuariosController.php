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
      $zonas = $usuario->zonas;
      $rubros = $usuario->rubros;
      $mensajesRecibidos = $usuario->mensajesRecibidos;

      return view('perfil_usuario', compact('usuario', 'zonas', 'rubros', 'mensajesRecibidos'));
    }

    public function mostrar($id){
      $usuario = User::findOrFail($id);
      $zonas = $usuario->zonas;
      $rubros = $usuario->rubros;
      return view('perfil_usuario', compact('usuario', 'zonas', 'rubros'));
    }

    public function guardarCambios(Request $req) {

      $id = $req->identificador;
      $usuario = User::findOrFail($id);
      $zonas = $usuario->zonas;
      $rubros = $usuario->rubros;

      if ($req->file('avatar') != null)
      {
      $avatar = $req->file('avatar');
      $usuario->guardarAvatar($avatar);
       }

      //Guardar Rubros
      if ($req->RUBRO_S != 0) {
        $id_rubro_p = $req->RUBRO_P;
        $id_rubro_s = $req->RUBRO_S;
        $usuario->rubros()->sync([$id_rubro_p => ['orden' => '1'], $id_rubro_s => ['orden'=>'2']]);
      }

      if ($req->RUBRO_S == 0) {
        $id_rubro_p = $req->RUBRO_P;
        $usuario->rubros()->sync([$id_rubro_p => ['orden' => '1']]);
      }

      if ($req->zona != null) {
          $usuario->zonas()->sync($req->zona);
      }
      if ($req->descripcion != null) {
         $usuario->descripcion = $req->descripcion;
         $usuario->save();
      }

      return view('perfil_usuario', compact('usuario', 'zonas', 'rubros'));
    }

    public function buscadorAvanzado(Request $req) {

      if ($req =! null) {
         $usuarios = User::trabajador();

         //recibo array de id de rubros
         //donde ->rubros tiene

         $cantidad = $usuarios->count();
         $usuarios = $usuarios->paginate(10);
      }
      else {
         $usuarios = User::trabajador();
         $cantidad = $usuarios->count();
         $usuarios = $usuarios->paginate(10);
       }

      return view('/buscador', compact('usuarios', 'cantidad'));
    }



}
