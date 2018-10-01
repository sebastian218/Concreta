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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
						<label for="email"> Email</label>
	          <?php if (isset($errores["email"])): ?>
	            <input  class="input-form error" placeholder="" type="email" name="email" id="email" value="">
	            <p class="p-error" ><?=$errores["email"]?></p>
	            <?php else: ?>
	              <input  class="input-form" placeholder="" type="text" name="email" id="email" value="">
	          <?php endif; ?>
						<label for="password"> Password</label>
						<?php if (isset($errores["password"])): ?>
	            <input  class="input-form error" placeholder="" type="password" name="password" id="password" value="">
	            <p class="p-error" ><?=$errores["password"]?></p>
	            <?php else: ?>
	              <input  class="input-form" placeholder="" type="password" name="password" id="password" value="">
	          <?php endif; ?>
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
