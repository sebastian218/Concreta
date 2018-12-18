<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\muro;
use App\Http\Resources\Muro as MuroResource;

Route::get('/apiMuro/{idUsuario}/{ultimo}', function ($idUsuario,$ultimo) {

  $posts = \App\User::find($idUsuario)->traerPosteosRubroAll()->where("id", ">", $ultimo);

  foreach ($posts as $post) {
    $post->usuario;
    $post->zona;
    $post->rubro;
  }

  return $posts;
});


 Route::get('/', function () {
    return redirect('/index');
});

 // Esta ruta la estoy armando para que aparezcan perfiles profesionales en la home.Seba
 Route::get('/index', "UsuariosController@getProfesionales");

//Route::get('/index', function(){

    // return view('index');
//});



Route::get('/pruebas', function() {
  if(DB::connection()->getDatabaseName())
   {
     return "conncted sucessfully to database ".DB::connection()->getDatabaseName();
   }
   else {return false;}
});

Route::get('/perfil', function() {
  return view('perfil_usuario');
});

Route::get('/perfil/log/{id}', "UsuariosController@home");

Route::post('/perfil/log/{id}', "UsuariosController@guardarCambios");

Route::post('/perfil/log/trabajos/{id}', "TrabajosController@guardarNuevoTrabajo");

Route::get('/muro', "muroController@posteos");

Route::post('/muro', "muroController@guardarPosteo");

Route::get("/perfil/ver/{id}", "UsuariosController@mostrar");

Route::get('/listado', "UsuariosController@listadoTodos");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/plantilla', function() {
  return view('plantilla');
});

Route::get('/buscador', 'UsuariosController@buscadorTodos');

Route::post('/buscador', 'UsuariosController@buscadorAvanzado');
Route::get('/buscadorA', 'UsuariosController@buscadorAvanzado');

Route::get('/factory', function() {
  return view('llegue');
});

Route::get('/buscadorPorPalabra', 'UsuariosController@buscadorPorPalabra');
