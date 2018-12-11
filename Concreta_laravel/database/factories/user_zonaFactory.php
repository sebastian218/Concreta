<?php

use Faker\Generator as Faker;
use App\Usuario_zona;
use App\User;
use App\Zona;

$factory->define(Usuario_zona::class, function (Faker $faker) {

  $usuarios = App\User::all();

    return [
      'USUARIO_ID' => $usuarios->shuffle()[0]->ID,
      'ZONA_ID' => Zona::all()->shuffle()[0]->ID,
    ];
});
