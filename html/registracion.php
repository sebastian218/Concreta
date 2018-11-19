<?php

require_once("init.php");

  $errores = [];
$usernameDefault = "";
$nombreDefault = "";
$apellidoDefault = "";
$emailDefault = "";


  if ($_POST) {
    $usernameDefault = $_POST["usuario"];
    $nombreDefault = $_POST["nombre"];
    $apellidoDefault=$_POST["apellido"];
    $emailDefault = $_POST["email"];

    // Validar al  usuario
    $errores = $validator->validarUsuario($_POST);
    if (empty($errores)) {
      // Registrarlo
      $usuario = new Usuario($_POST);
     $db->crearUsuario($usuario);

      // Redirigir a la home
      header("location:home.php");exit;
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php  include "head.php"; ?>
    <title>REGISTRACION</title>
  </head>
  <body>
    <div class="container_formularios_gral">

      <?php include("header.php") ?>
      <div class="banner_perfiles">

      <p class="crea_perfil">Completá tu perfil y registrate en Concreta</p>
      </div>

      <section>
        <div class="reg-container">

        <div class="Registro_cliente">

          <form class="registracion_cliente borde_redondeado" action="" method="POST" enctype="multipart/form-data" >

          <label for="usuario"> Usuario</label>
          <?php if (isset($errores["usuario"])): ?>
            <input  class="input-form error" placeholder="" type="text" name="usuario" id="usuario" value="">
            <p class="p-error" ><?=$errores["usuario"]?></p>
            <?php else: ?>
              <input  class="input-form" placeholder="" type="text" name="usuario" id="usuario" value="<?= $usernameDefault ?>">
          <?php endif; ?>

          <label for="nombre"> Nombre</label>
          <?php if (isset($errores["nombre"])): ?>
            <input  class="input-form error" placeholder="" type="text" name="nombre" id="usuario" value="">
            <p class="p-error" ><?=$errores["nombre"]?></p>
            <?php else: ?>
              <input  class="input-form" placeholder="" type="text" name="nombre" id="usuario" value="<?= $nombreDefault ?>">
          <?php endif; ?>

          <label for="apellido"> Apellido </label>
          <?php if (isset($errores["apellido"])): ?>
            <input  class="input-form error" placeholder="" type="text" name="apellido" id="usuario" value="">
            <p class="p-error" ><?=$errores["apellido"]?></p>
            <?php else: ?>
              <input  class="input-form" placeholder="" type="text" name="apellido" id="usuario" value="<?= $apellidoDefault ?>">
          <?php endif; ?>

          <label for="email"> Email </label>
          <?php if (isset($errores["email"])): ?>
            <input  class="input-form error" placeholder="" type="text" name="email" id="usuario" value="">
            <p class="p-error" ><?=$errores["email"]?></p>
            <?php else: ?>
              <input  class="input-form" placeholder="" type="text" name="email" id="usuario" value="<?= $emailDefault ?>">
          <?php endif; ?>


          <label for="password"> Contraseña </label>
          <?php if (isset($errores["password"])): ?>
            <input  class="input-form error" placeholder="" type="password" name="password" id="usuario" value="">
            <p class="p-error" ><?=$errores["password"]?></p>
            <?php else: ?>
              <input  class="input-form" placeholder="" type="password" name="password" id="usuario" value="">
          <?php endif; ?>

          <label for="password-confirm"> Confirmar contraseña </label>
          <?php if (isset($errores["password-confirm"])): ?>
            <input  class="input-form error" placeholder="" type="password" name="password-confirm" id="usuario" value="">
            <p class="p-error" ><?=$errores["password-confirm"]?></p>
            <?php else: ?>
              <input  class="input-form" placeholder="" type="password" name="password-confirm" id="usuario" value="">
          <?php endif; ?>

         <div class="enviar_cancelar">
           <button class="boton"  type="reset" name="button">Cancelar</button>
          <button class="boton enviar"  type="submit" name="button">Registrarme</button>
        </div>

      </form>


      </div>
      </section>
      <footer>
<?php include("footer.php") ?>
      </footer>
    </div>
    </body>
  </html>
