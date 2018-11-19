<?php

include_once "mysqldb.php";

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
         <?=$usuario->getNombre()?> <?=$usuario->getApellido()?>
     </h2>
  </body>
</html>
