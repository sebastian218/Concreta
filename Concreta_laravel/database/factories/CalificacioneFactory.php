<?php

use Faker\Generator as Faker;
use App\Calificacione;
use App\User;

$factory->define(Calificacione::class, function (Faker $faker) {
  $usuarios = App\User::all();

return [
  'calificacion' => rand(0,5),
  'id_calificado' => $usuarios->shuffle()[0]->ID,
  'id_calificador' => $usuarios->shuffle()[0]->ID,
  'comentario' => $faker->realText(250),
  'fecha' => $faker->datetime(),
    ];
});
