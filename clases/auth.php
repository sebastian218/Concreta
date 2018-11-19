<?php

class Auth {

  public function __construct(){

  session_start();

  if (isset($_COOKIE["usuarioLogueado"]) && isset($_SESSION["usuarioLogueado"]) == false) {
     $_SESSION["usuarioLogueado"] = $_COOKIE["usuarioLogueado"];
   }

  }
  
  public function loguear($email)  {
    $_SESSION["usuarioLogueado"] = $email;
  //  $_SESSION["nombre"] = //llamar Nombre
  }

  public function estaLogueado() {
    if (isset($_SESSION["usuarioLogueado"])) {
      return true;
    }
    else {
      return false;
    }
  }
    public function traerUsuarioLogueado() {
      $usuario = buscarPorEmail($_SESSION["usuarioLogueado"]);
      return $usuario;
    }

}

 ?>
