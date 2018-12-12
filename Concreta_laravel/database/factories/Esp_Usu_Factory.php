<?php

use Faker\Generator as Faker;
use App\User;
use App\Usuario_especialidades;
use App\Rubro;
use App\Especialidade;

$factory->define(Usuario_especialidades::class, function (Faker $faker) {
    //$usuarios = App\Rubro::all();
    //$usuario = $usuarios->shuffle()[0];
    //$id_esp = App\Rubro::all()->shuffle()[0]->especialidades->shuffle()[0]->ID;
    $especialidad = App\Especialidade::all()->shuffle()->first();
    //$usu_id = $especialidad->rubro->usuariosRubro->shuffle()[0]->ID;

    return [
      'usuario_id' => $especialidad->rubro->usuariosRubro->shuffle()->first()->ID,
      'especialidad_id' =>$especialidad->ID,
    ];
});
