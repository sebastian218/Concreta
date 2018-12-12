<?php

use Faker\Generator as Faker;
use App\User;
use App\Usuario_rubro;
use App\Rubro;
use App\Especialidade;

$factory->define(Usuario_rubro::class, function (Faker $faker) {
    return [
        'USUARIO_ID' => App\User::all()->shuffle()->first()->ID,
        'RUBRO_ID' => App\Rubro::all()->shuffle()->first()->ID,
        'orden' => rand(1,2),
    ];
});
