<?php
function validarUsuario() {
  $errores = [];

  if (strlen($_POST["usuario"]) == 0) {
    $errores[] = "Ey, dejaste el nombre de usuario vacío";
  }
  else if (strlen($_POST["usuario"]) < 8)  {
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
 if (strlen($_POST["password"]) == 0) {
   $errores[] = "Ey, dejaste la contraseña vacío";
 } else if (strlen($_POST["password"]) < 8)  {
   $errores[] = "Ey, la contraseña al menos 8 caracteres";
 }
 if (strlen($_POST["password-confirm"]) == 0) {
   $errores[] = "Ey, dejaste la confirmación de contraseña vacía";
 }
 if (strlen($_POST["password"]) != strlen($_POST["password-confirm"])  ) {
   $errores[] = "Falló la confirmación de contraseña";
}
if (isset($_POST["RUBRO"])){

      if (!isset($_POST["zona"])) {
        $errores[] = "Debe seleccionar zona";
      }




}
  return $errores;
}

?>
