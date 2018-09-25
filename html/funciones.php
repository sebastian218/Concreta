<?php
function validarUsuario($datos) {
  $datosFinales = [];
  $errores = [];
  foreach ($datos as $key => $dato ) {

<<<<<<< Updated upstream
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
=======
    $datosFinales[$key] = trim($dato);
  }


  if (strlen($datosFinales["usuario"]) == 0) {
    $errores["usuario"] = "Por favor completá tu nombre de usuario";
  }
  if (strlen($datosFinales["nombre"]) == 0){
    $errores["nombre"] = "Por favor completá tu nombre";
  } else if (ctype_alpha($datosFinales["nombre"]) == false) {
         $errores["nombre"] = "Hubo erro en el nombre porque tiene caracteres no alfabeticos";
  }
  if (strlen($datosFinales["apellido"]) == 0){
    $errores["apellido"] = "Por favor completá tu apellido";
  }else if (ctype_alpha($datosFinales["apellido"]) == false) {
         $errores["apellido"] = "Hubo erro en el apellido porque tiene caracteres no alfabeticos";
  }
  if (strlen($datosFinales["email"]) == 0 ){
   $errores["email"] = "Por favor ingresá un email";
 }else if (filter_var($datosFinales["email"], FILTER_VALIDATE_EMAIL) == false) {
   $errores["email"] = "El email ingresado no es válido";
 }
 if (strlen($datosFinales["password"]) == 0) {
   $errores["password"] = "Por favor completá el campo contraseña";
 } else if (strlen($datosFinales["password"]) < 8)  {
   $errores["password"] = "La contraseña debe tener al menos 8 caracteres";
 }
 if (strlen($datosFinales["password-confirm"]) == 0) {
   $errores["password-confirm"] = "Por favor confirmá la contraseña";
 }else if ($datosFinales["password"] != $datosFinales["password-confirm"] ) {
   $errores["password-confirm"] = "Falló la confirmación de contraseña";
}

if ( isset($_POST["button-profesional"])) {

  if (!isset($_POST["zona"])) {
    $errores["zona"] = "Seleccioná una zona";
  }
  if (!isset($datosFinales["RUBRO"])) {
     $errores["RUBRO"] = "Seleccioná tu rubro";
  }
  if (strlen($datosFinales["DNI"]) == 0) {
    $errores["DNI"] = "Por favor completá nro de DNI";
  }

>>>>>>> Stashed changes
}

  return $errores;
}


 function armarUsuario() {

    $usuario = [
         "usuario " => trim($_POST["usuario"]),
         "nombre"  => trim($_POST["nombre"]),
         "apellido"=>trim($_POST["apellido"]),
         "email" =>trim($_POST["email"]),
         "password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
            ];

    if (isset($_POST["button-profesional"])) {

      $usuario["zona"]= trim($_POST["zona"]);
      $usuario["RUBRO"]= trim($_POST["RUBRO"]);
      $usuario["DNI"]= trim($_POST["DNI"]);

      }

      return $usuario;

 }


 function crearUsuario($usuario) {

   $usuarios = file_get_contents("usuarios.json");
   $usuariosArray = json_decode($usuarios );
   if ($usuarios == NULL) {
       $ususarios = [];
   }
   $usuariosArray[] = $usuario;
   $usuariosFinal = json_encode($usuariosArray);
   file_put_contents("usuarios.json", $usuariosFinal);
}

?>
