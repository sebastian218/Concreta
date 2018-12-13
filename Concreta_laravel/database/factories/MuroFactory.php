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
      'foto'=> '["VnkOf1UNUAH6bV0ESXJLTHeSQM8VtLxIH8mAZoHH.png","zyF0mWAtRvxFx4dcLb3KuIzfkl7ul3WrhnRvWtdw.jpeg","9TsqHCLeNRhYuldSIqH4B4moWz2BJwi9xSb6GOOl.jpeg","yMTymsrpl37cnubcM3kPEkVqmnJQ06jKxebHh31O.jpeg"]'

    ];
});
