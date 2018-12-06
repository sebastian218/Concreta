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

Route::get('/', function () {
    return view('welcome');
});

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

Route::get("/perfil/ver/{id}", "UsuariosController@mostrar");

Route::get('/listado', "UsuariosController@listadoTodos");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/plantilla', function() {
  return view('plantilla');
});

//Route::post('/guardarAvatar','UsuariosController@guardarAvatar');
