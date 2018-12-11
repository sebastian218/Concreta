<?php

use Faker\Generator as Faker;
use App\User;
use App\Usuario_especialidades;
use App\Rubro;

$factory->define(Usuario_especialidades::class, function (Faker $faker) {
    $usuarios = App\User::all();
    $usuario = $usuarios->shuffle()[0];
    $id_esp = App\Rubro::all()->shuffle()[0]->especialidades->shuffle()[0]->ID;

    return [
      'usuario_id' =>$usuario->ID,
      'especialidad_id' =>$id_esp,
    ];
});
