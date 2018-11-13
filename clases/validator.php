<?php

class Validator {
  function validarUsuario($datos) {
    global $db;
    $datosFinales = [];
    $errores = [];
    foreach ($datos as $key => $dato ) {
      if (is_string($dato)) {
        $datosFinales[$key] = trim($dato);
      } else {
        $datosFinales[$key] = $dato;
      }

    }

    if (strlen($datosFinales["usuario"]) == 0) {
      $errores["usuario"] = "Por favor completá tu nombre de usuario";
    }else if($db->buscarPorUsuario($datosFinales["usuario"]) != NULL) {
      $errores["usuario"] = "El nombre de Usuario ya está en uso";
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
   } else if ($db->buscarPorEmail($datosFinales["email"]) != NULL) {
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

  public function validarLogin($datos) {
    global $db;
    $errores = [];

    if ($datos["email"] == "") {
      $errores["email"] = "Dejaste el email vacío";
    }
    else if (filter_var($datos["email"], FILTER_VALIDATE_EMAIL) == false) {
      $errores["email"] = "El email ingresado no es un email";
    }
    else {
      $usuario = $db->buscarPorEmail($datos["email"]);
      if ($usuario == null) {
        $errores["email"] = "El email no existe";
      }
    }

    if ($datos["password"] == "") {
      $errores["password"] = "Dejaste la pass vacía";
    }
    else {
      if ($usuario != null) {
        if (password_verify($datos["password"], $usuario["PASS"]) == false) {
          $errores["password"] = "Contraseña incorrecta";
        }
      }
    }

    return $errores;
  }



}


 ?>
