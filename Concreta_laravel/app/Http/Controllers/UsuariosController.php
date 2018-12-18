<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Zona;
use App\Rubro;
use App\Especialidade;
use App\Usuario_zona;
use App\Usuario_rubro;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


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
      $soloVista = false;
      //if ($id == Auth::ID()){
      return view('perfil_usuario', compact('usuario', 'zonas', 'rubros', 'mensajesRecibidos', 'soloVista'));
      //}
      //else {
        //return redirect("/index");
      //}
    }

    public function mostrar($id){
      $usuario = User::findOrFail($id);
      $zonas = $usuario->zonas;
      $rubros = $usuario->rubros;
      $soloVista = true;
      return view('perfil_usuario', compact('usuario', 'zonas', 'rubros', 'soloVista'));
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

      if($req->especialidades != 0) {
        $usuario->especialidades()->sync($req->especialidades);
      }

      if ($req->descripcion != null) {
         $usuario->descripcion = $req->descripcion;
         $usuario->save();
      }

      //return redirect()->route('perfil_usuario', compact('usuario', 'zonas', 'rubros'));
      return redirect("/perfil/log/" . $id)->with([
        "status" => "Los cambios se actualizaron correctamente!"
      ]);
    }

    public function buscadorTodos() {
      $usuarios = User::trabajador();
      $cantidad = $usuarios->count();
      $usuarios = $usuarios->paginate(10);

     return view('/buscador', compact('usuarios', 'cantidad'));
    }

    public function buscadorPorPalabra(Request $string) {
      $str = $string->busqueda_string;
      $palabras = [];
      $palabras = preg_split('/\s+/', $str);

      /*$zonas_busc = [];
      foreach ($palabras as $palabra) {
      $zona_b = DB::table('zonas')
      ->where('zonas.NOMBRE_ZONA', 'LIKE', '%'.$palabra.'%')
      ->pluck('ID');
      $zonas_busc[] = $zona_b;
      }
      */
  /*
      $zonas_busc = [];
      $zona_b = DB::table('zonas');
      foreach ($palabras as $palabra) {
      $ids = $zona_b->where('zonas.NOMBRE_ZONA', 'LIKE', '%'.$palabra.'%')->pluck('ID');
      if(!empty($ids)){$zonas_busc[] = $ids;}
      }

      $rubros_buscar = [];
      $rub_b = DB::table('rubros');
      foreach ($palabras as $palabra) {
      $ids = $rub_b->where('rubros.NOMBRE_RUBRO', 'LIKE', '%'.$palabra.'%')->pluck('ID');
      if(!empty($ids)){$rubros_buscar[] = $ids;}
      }
*/

      $rub_b = DB::table('rubros')
      ->Where(function($query) use($palabras) {
          for ($i = 0; $i <count($palabras); $i++) {
            $query->orwhere('rubros.NOMBRE_RUBRO', 'LIKE', '%'.$palabras[$i].'%');
          }
      })->pluck('ID');

      $zon_b = DB::table('zonas')
      ->Where(function($query) use($palabras) {
          for ($i = 0; $i <count($palabras); $i++) {
            $query->orwhere('zonas.NOMBRE_ZONA', 'LIKE', '%'.$palabras[$i].'%');
          }
      })->pluck('ID');

      $esp_b = DB::table('especialidades')
      ->Where(function($query) use ($palabras) {
          for ($i = 0; $i <count($palabras); $i++) {
            $query->orwhere('especialidades.nombre', 'LIKE', '%'.$palabras[$i].'%');
          }
      })->pluck('ID');


      if(empty($zon_b[0])){
        $id_z_buscado = Zona::all()->pluck('ID');
      }
      else {$id_z_buscado = $zon_b;}

      if(empty($rub_b[0])) {
        $id_r_buscado = Rubro::all()->pluck('ID');
      }
        else {$id_r_buscado = $rub_b;}

      if(empty($esp_b[0])) {
        $esp_buscadas = Especialidade::all()->pluck('ID');
      }
      else {$esp_buscadas = $esp_b;}

               $usuarios_id = DB::table('users')
               ->join('usuario_rubro', 'users.id', '=', 'usuario_rubro.usuario_id')
               ->join('usuario_zona', 'users.id', '=', 'usuario_zona.USUARIO_ID')
               ->join('especialidades_usuarios', 'users.id', '=', 'especialidades_usuarios.usuario_id')
               ->whereIn('usuario_rubro.RUBRO_ID', $id_r_buscado)
               ->whereIn('usuario_zona.ZONA_ID', $id_z_buscado)
               ->whereIn('especialidades_usuarios.especialidad_id', $esp_buscadas)

               ->pluck('users.id');


               $usuarios = User::whereIn('ID', $usuarios_id)->paginate(3);

               $cantidad = $usuarios->total();


               $vac = compact('usuarios', 'cantidad', 'id_r_buscado', 'id_z_buscado');


            return view('/buscador', $vac);

    }

    public function buscadorAvanzado(Request $req) {

         $todos = User::trabajador();

         if (isset($id_r_buscado) == false) {
           if($req->id_rubro_buscado == 't'){
            $id_r_buscado = Rubro::all()->pluck('ID'); }
            else {$id_r_buscado[] = $req->id_rubro_buscado;}
           if($req->id_zona_buscado == 't'){
            $id_z_buscado = Zona::all()->pluck('ID'); }
            else {$id_z_buscado[] = $req->id_zona_buscado;}
           if(empty($req->esp_buscadas)) {
             $esp_buscadas = Especialidade::all()->pluck('ID');}
             else {$esp_buscadas = $req->esp_buscadas;}
           }

         $usuarios_id = DB::table('users')
         ->join('usuario_rubro', 'users.id', '=', 'usuario_rubro.usuario_id')
         ->join('usuario_zona', 'users.id', '=', 'usuario_zona.USUARIO_ID')
         ->join('especialidades_usuarios', 'users.id', '=', 'especialidades_usuarios.usuario_id')
         ->whereIn('usuario_rubro.RUBRO_ID', $id_r_buscado)
         ->whereIn('usuario_zona.ZONA_ID', $id_z_buscado)
         ->whereIn('especialidades_usuarios.especialidad_id', $esp_buscadas)

         ->pluck('users.id');


         $usuarios = User::whereIn('ID', $usuarios_id)->paginate(1);

         $cantidad = $usuarios->total();


         $vac = compact('usuarios', 'cantidad', 'id_r_buscado', 'id_z_buscado', 'esp_buscadas');


      return view('/buscador', $vac);
    }

   public function getProfesionales(){

    $profesionales = User::where("esTrabajador","!=" , "0")->get();

     $profPromAlto = [];


   foreach ($profesionales as $profesional) {

     if ($profesional->promedioInt()>=3) {
        $profPromAlto[] = $profesional;
     }

      }

       return view('/index',compact('profPromAlto'));

}

}
