<?php
include ("funciones.php");
  $errores = [];

  if ($_POST) {
    $usernameDefault = $_POST["usuario"];

    // Validar al  usuario
    $errores = validarUsuario();
    if (empty($errores)) {
      // Registrarlo

      // Redirigir a la home
      header("location:home.php");exit;
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>REGISTRACION</title>

    <link rel="stylesheet" href="../css/estilos_v2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> PERFIL PROFESIONAL</title>
  </head>
  <body>
    <div class="container_formularios_gral">

      <?php include("header.php") ?>
      <div class="banner_perfiles">

      <p class="crea_perfil">Completá tu perfil</p>
      <p class="crea_perfil">REGISTRATE EN CONCRETA</p>
      </div>

      <section>
        <div class="reg-container">

        <div class="Registro_cliente">
          <?php if (! empty($errores)): ?>
            <ul>
              <?php foreach ($errores as $error): ?>
                <li> <?= $error  ?> </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <form class="registracion_cliente" action="" method="POST">
          <label for="usuario"> Usuario</label>
          <input  class="input-form" type="text" name="usuario" id="usuario" value="Elegí un nombre de usuario">
          <label for="nombre"> Nombre</label>
          <input class="input-form" type="text" name="nombre" id="nombre" value="">
          <label for="apellido"> Apellido </label>
          <input class="input-form" type="text" name="apellido" id="apellido" value="">
          <label for="email"> Email </label>
          <input class="input-form" type="email" name="email" id= "email" value="">

          <label for="password"> Contraseña </label>
          <input class="input-form" type="password" name="password" id="password" value="">
          <label for="password-confirm"> Confirmar contraseña </label>
          <input class="input-form" type="password" name="password-confirm" id="password-confirm" value="">

         <div class="enviar_cancelar">
          <button class="button-form"  type="submit" name="button">Registrarme</button>
          <button class="button-form"  type="reset" name="button">Cancelar</button>
        </div>

      </form>



      </div>
      </section>
<?php include("footer.php") ?>

    </div>
    </body>
  </html>
