@extends('plantilla')

@section('contenido')
  @php

foreach ($usuarios as $usuario) {
  // code...
  //echo $usuario["NOMBRE"]." ";
  echo $usuario->NOMBRE;
}

$usuario = $usuarios[0];
echo "segundo usuario: " . $usuario->NOMBRE;
//var_dump($usuario);

//Recursivo
$zonas = $usuario->zona;

foreach ($zonas as $zona) {
   echo $zona->NOMBRE_ZONA;
}

//var_dump($usuario->rubro()->get())

  @endphp
@endsection
