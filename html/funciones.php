<?php
function validarUsuario() {
  $errores = [];

  if (strlen($_POST["usuario"]) == 0) {
    $errores["er_usuario"] = "Ingresá un nombre de usuario";
  }
  else if (strlen($_POST["usuario"]) < 8)  {
    $errores["er_usuario_long"] = "El nombre de usuario debe tener al menos 8 caracteres";
  }

  if (strlen($_POST["nombre"]) == 0)
  {
    $errores["er_nombre"] = "Completá tu nombre";
  }
  if (strlen($_POST["apellido"]) == 0)
  {
    $errores["er_apellido"] = "Completá tu apellido";
  }
  if (strlen($_POST["email"]) == 0 ){
   $errores["er_email"] = "Ingresá un email";
 }
 else if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
   $errores["er_email_inv"] = "El email ingresado no es válido";
 }
 if (strlen($_POST["password"]) == 0) {
   $errores["er_pass"] = "Elegí una contraseña";
 } else if (strlen($_POST["password"]) < 8)  {
   $errores["er_pass_8"] = "La contraseña debe tener al menos 8 caracteres";
 }
 if (strlen($_POST["password-confirm"]) == 0) {
   $errores["er_pass_con"] = "Por favor confirmá la contraseña";
 }
 if ($_POST["password"] != $_POST["password-confirm"]  ) {
   $errores["er_pass_distintas"] = "Falló la confirmación de contraseña";
}
if (isset($_POST["RUBRO"])){

      if (!isset($_POST["zona"])) {
        $errores[] = "Seleccioná una zona";
      }




}
  return $errores;
}

?>
