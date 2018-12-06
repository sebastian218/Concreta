<?php

use Faker\Generator as Faker;
use App\Mensaje;

$factory->define(Mensaje::class, function (Faker $faker) {
      $usuarios = \App\User::all();

    return [
      'USER_ID_1' => $usuarios->shuffle()[0]->ID,
      'USER_ID_2' => $usuarios->shuffle()[0]->ID,
      'MENSAJE' => $faker->realText(140),
      'FECHA_INIT' => $faker->datetime(),

        //
    ];
});
