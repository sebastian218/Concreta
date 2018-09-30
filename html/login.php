<?php

require_once "funciones.php";

if (estaLogueado()) {
	header("location:home.php");exit; //mandar a perfil indiv
}

if ($_POST) {
  $errores = validarLogin($_POST); //hacer

  if ( empty($errores) ) {

		loguear($_POST["email"]);
		// REDIRIGIRLO
		header("location:home.php");exit; //may o min
	}
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estilos_v2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>CONCRETA</title>
  </head>
  <body class="container_login">
    <div>
      <?php include("header.php") ?>
      <div class="banner_perfiles">
     </div>
      <section >
        <div class="Registro">
          <form class="login" action="" method="POST">
            <label for="email"> Email </label>
            <input class="input-form" type="email" name="email" id="email" value="">
            <label for="password"> Contraseña </label>
            <input class="input-form"  type="password" name="password" id= "password" value="">
            <br>
            <div class="enviar_cancelar">
            <button class="boton" type="submit" name="button">Iniciar Sesión</button>
            <br>
            <button class="boton" type="reset" name="button">Cancelar</button>
            </div>
          </form>


        </div>
      </section>
      <footer class="footer_login">
      <?php include("footer.php") ?>
      </footer>
    </div>

  </body>
</html>
