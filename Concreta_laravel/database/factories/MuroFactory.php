<?php

use Faker\Generator as Faker;
use App\User;
use App\Zona;
use App\Rubro;
use App\Muro;

$factory->define(Muro::class, function (Faker $faker) {
     $usuarios = App\User::all();
     $usuario = $usuarios->shuffle()[1];

    return [
      'usuario_id' => $usuario->ID,
      'rubro_id' => Rubro::all()->shuffle()[1],
      'zona_id' => Zona::all()->shuffle()[1],
      'mensaje' => $faker->realText(140),
      'created_at' => $faker->datetime(),
      'updated_at' => $faker->datetime(),

    ];
});
