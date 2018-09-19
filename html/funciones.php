<?php
function validarUsuario() {
  $errores = [];

  if (strlen($_POST["usuario"]) == 0) {
    $errores[] = "Por favor completá tu nombre de usuario";
  }
  else if (strlen($_POST["usuario"]) < 8)  {
    $errores[] = "El nombre de usuario debe tener al menos 8 caracteres";
  }

  if (strlen($_POST["nombre"]) == 0)
  {
    $errores[] = "Por favor completá tu nombre";
  }
  if (strlen($_POST["apellido"]) == 0)
  {
    $errores[] = "Por favor completá tu apellido";
  }
  if (strlen($_POST["email"]) == 0 ){
   $errores[] = "Por favor ingresá un email";
 }
 else if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
   $errores[] = "El email ingresano es válido";
 }
 if (strlen($_POST["password"]) == 0) {
   $errores[] = "Por favor completá el campo contraseña";
 } else if (strlen($_POST["password"]) < 8)  {
   $errores[] = "La contraseña debe tener al menos 8 caracteres";
 }
 if (strlen($_POST["password-confirm"]) == 0) {
   $errores[] = "Por favor confirmá la contraseña";
 }
 if (strlen($_POST["password"]) != strlen($_POST["password-confirm"])  ) {
   $errores[] = "Falló la confirmación de contraseña";
}
if (isset($_POST["RUBRO"])){

      if (!isset($_POST["zona"])) {
        $errores[] = "Seleccioná una zona";
      }




}
  return $errores;
}

?>
