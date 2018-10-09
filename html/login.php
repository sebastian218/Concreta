<?php

require_once "funciones.php";

if (estaLogueado()) {
	header("location:home.php");exit; //mandar a perfil indiv
}

if ($_POST) {
  $errores = validarLogin($_POST);

  if (empty($errores)) {
    loguear($_POST["email"]);

    if (isset($_POST["recordame"])) {
      setcookie("usuarioLogueado", $_POST["email"], time() + 60 * 60 * 24 * 7);
    }

    header("Location:home.php");exit;
  }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php  include "head.php"; ?>
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
						<div class="form-group">
							<input type="checkbox" name="recordame" class="control" value=""> Recordame
						</div>
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
