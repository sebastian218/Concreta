<?php

include_once "funciones.php";

  $id = $_GET["id"];

$usuario = buscarPorId($id);


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
     <h1>Bienvenido</h1>
     <h2>
         <?=$usuario["nombre"]?> <?=$usuario["apellido"]?>
     </h2>
     <img src="img/<?=$usuario["email"]?>.jpeg" alt="">
  </body>
</html>
