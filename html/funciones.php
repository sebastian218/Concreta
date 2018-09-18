<?php
function validarUsuario() {
  $errores = [];

  if (strlen($_POST["usuario"]) == 0) {
    $errores[] = "Ey, dejaste el nombre de usuario vacío";
  }
  else if ((strlen($_POST["usuario"]) < 8)  {
    $errores[] = "Ey, el nombre de usuario debe tener al menos 8 caracteres";
  }

  if (($_POST["nombre"]) == 0)
  {
    $errores[] = "Ey, dejaste el nombre vacío";
  }
  if (strlen($_POST["email"]) == 0 ){
   $errores[] = "Dejaste el email vacío";
 }
 else if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
   $errores[] = "El email es incorrecto";
 }

  return $errores;
}

?>
