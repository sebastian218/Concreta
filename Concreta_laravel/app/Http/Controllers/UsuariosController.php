<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Zona;
use App\Rubro;
use App\Usuario_zona;
use App\Usuario_rubro;
use DB;
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

        $id_rubro_p = $req->RUBRO_P;
        $id_rubro_s = $req->RUBRO_S;
        $usuario->rubros()->sync([$id_rubro_p => ['orden' => '1'], $id_rubro_s => ['orden'=>'2']]);


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
      //return redirect()->route('perfil_usuario', compact('usuario', 'zonas', 'rubros'));
      return redirect("/perfil/log/" . $id)->with([
        "status" => "Usuario actualizado correctamente"
      ]);
    }

    public function buscadorTodos() {
      $usuarios = User::trabajador();
      $cantidad = $usuarios->count();
      $usuarios = $usuarios->paginate(10);

     return view('/buscador', compact('usuarios', 'cantidad'));
    }

    public function buscadorAvanzado(Request $req) {

         $todos = User::trabajador();

         if (isset($id_r_buscado) == false) {
         $id_r_buscado = $req->id_rubro_buscado;
         $id_z_buscado = $req->id_zona_buscado;}
         //

         $usuzona = Usuario_zona::all();
         $relacionesZona = $usuzona->where('ZONA_ID', $id_z_buscado)->pluck('USUARIO_ID');
         //var_dump($relaciones);
         //exit;
         //$usuarios = $todos->whereIn('ID', $relacionesZona)->get();
         $array_u = DB::table('usuario_rubro')->where('RUBRO_ID', $id_r_buscado)->pluck('USUARIO_ID');
         //$usuarios = DB::table('users')->whereIn('ID', $array_u)->get();
         $usuarios = $todos->whereIn('ID', $array_u)->whereIn('ID', $relacionesZona);
         $cantidad = $usuarios->count();

         $usuarios = $usuarios->paginate(1);




      return view('/buscador', compact('usuarios', 'cantidad', 'id_r_buscado', 'id_z_buscado'));
    }

   public function getProfesionales(){

      $profesionales = User::where("esTrabajador","!=" , "0")->get();

     $profPromAlto = [];

   foreach ($profesionales as $profesional) {

   //if($profesional->promedioInt() > 3){

        $profPromAlto[] = $profesional->esTrabajador;

      }

    dd($profPromAlto);


}






}
