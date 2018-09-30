<?php
session_start();
function validarUsuario($datos) {
  $datosFinales = [];
  $errores = [];
  foreach ($datos as $key => $dato ) {
    $datosFinales[$key] = trim($dato);
  }

  if (strlen($datosFinales["usuario"]) == 0) {
    $errores["usuario"] = "Por favor completá tu nombre de usuario";
  }
  if (strlen($datosFinales["nombre"]) == 0){
    $errores["nombre"] = "Por favor completá tu nombre";
  } else if (ctype_alpha($datosFinales["nombre"]) == false) {
         $errores["nombre"] = "Hubo error en el nombre porque tiene caracteres no alfabéticos";
  }
  if (strlen($datosFinales["apellido"]) == 0){
    $errores["apellido"] = "Por favor completá tu apellido";
  }else if (ctype_alpha($datosFinales["apellido"]) == false) {
         $errores["apellido"] = "Hubo error en el apellido porque tiene caracteres no alfabéticos";
  }
  if (strlen($datosFinales["email"]) == 0 ){
   $errores["email"] = "Por favor ingresá un email";
 }else if (filter_var($datosFinales["email"], FILTER_VALIDATE_EMAIL) == false) {
   $errores["email"] = "El email ingresado no es válido";
 } else if (buscarPorEmail($datosFinales["email"]) != NULL) {
      $errores["email"] = "El email ya esta en uso";
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
  if ($_FILES["avatar"]["error"] != 0) {
    $errores["avatar"] = "Hubo un error en la carga";
  } else {
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    if ($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
      $errores["avatar"] = "Solo puedes subir fotos jpg, png o jpeg";
    }
  }
}

  return $errores;
}
function proximoId(){

   $json = file_get_contents("usuarios.json");

   if ($json == "") {

     return 1;
   } else {


   $usuarios= json_decode($json, true);

   $ultimo = array_pop($usuarios);

     return $ultimo["id"] + 1;
   }
}

 function armarUsuario() {

    $usuario = [
         "id" => proximoId(),
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
   $usuarios = json_decode($usuarios, true);
   if ($usuarios == NULL) {
       $ususarios = [];
   }
   $usuarios[] = $usuario;
   $usuarios = json_encode($usuarios);
   file_put_contents("usuarios.json", $usuarios);
}

function traerUsuarios(){

  $usuarios = file_get_contents("usuarios.json");
  $usuarios = json_decode($usuarios, true);

  return $usuarios;
}


function buscarPorEmail($email) {

    $usuarios = file_get_contents("usuarios.json");
    $usuariosArray= json_decode($usuarios, true);

  foreach($usuariosArray as $clave => $valor){

    if ( $valor["email"] == $email){

      return $valor;

    }
  }
   return null;
}
function buscarPorId($id) {

    $usuarios = file_get_contents("usuarios.json");
    $usuariosArray= json_decode($usuarios, true);

  foreach($usuariosArray as $clave => $valor){

    if ( $valor["id"] == $id){

      return $valor;

    }
  }
   return null;
}
function loguear($email)  {
  $_SESSION["usuarioLogueado"] = $email;
//  $_SESSION["nombre"] = //llamar Nombre
}

function estaLogueado() {
  if (isset($_SESSION["usuarioLogueado"])) {
    return true;
  }
  else {
    return false;
  }
}
  function traerUsuarioLogueado() {
    $usuario = buscarPorEmail($_SESSION["usuarioLogueado"]);
    return $usuario;
  }

  function validarLogin($datos) {
    $errores = [];

    if ($datos["email"] == "") {
      $errores["email"] = "Dejaste el email vacío";
    }
    else if (filter_var($datos["email"], FILTER_VALIDATE_EMAIL) == false) {
      $errores["email"] = "El email ingresado no es un email";
    }
    else {
      $usuario = buscarPorEmail($datos["email"]);
      if ($usuario == null) {
        $errores["email"] = "El email no existe";
      }
    }

    if ($datos["password"] == "") {
      $errores["password"] = "Dejaste la pass vacía";
    }
    else {
      if ($usuario != null) {
        if (password_verify($datos["password"], $usuario["password"]) == false) {
          $errores["password"] = "Contraseña incorrecta";
        }
      }
    }

    return $errores;
  }

?>
