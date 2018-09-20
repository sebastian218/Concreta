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
            <p>Por favor corregí los siguientes campos:</p>
            <ul>
              <?php foreach ($errores as $error): ?>
                <li> <?= $error  ?> </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <form class="registracion_cliente" action="" method="POST">

          <label for="usuario">Usuario</label>
          <?php if (isset($errores["er_usuario"])) :?>
            <p class="mensaje_error_par"><?php echo $errores["er_usuario"]  ?></p>
          <?php endif; ?>
          <?php if (isset($errores["er_usuario_long"])) :?>
            <p class="mensaje_error_par"><?php echo $errores["er_usuario_long"]  ?></p>
          <?php endif; ?>
          <input
          <?php if (isset($errores["er_usuario"]) || isset($errores["er_usuario_long"])): ?>
            placeholder=""
            class="mensaje_error input-form"
          <?php endif; ?>
          class="input-form" type="text" name="usuario" id="usuario"
          <?php if (($_POST) && isset($errores["er_usuario_long"])==false ):?>
            value="<?php echo $_POST["usuario"]; ?>"
          <?php endif; ?>
          >

          <label for="nombre">Nombre</label>
          <?php if (isset($errores["er_nombre"])) :?>
            <p class="mensaje_error_par"><?php echo $errores["er_nombre"]  ?></p>
          <?php endif; ?>
          <input
          <?php if (isset($errores["er_nombre"])): ?>
            placeholder=""
            class="mensaje_error input-form"
          <?php endif; ?>
          class="input-form" type="text" name="nombre" id="nombre"
          <?php if (($_POST) && isset($errores["er_nombre"])==false ):?>
            value="<?php echo $_POST["nombre"]; ?>"
          <?php endif; ?>
          >

          <label for="apellido">Apellido</label>
          <?php if (isset($errores["er_apellido"])) :?>
            <p class="mensaje_error_par"><?php echo $errores["er_apellido"]  ?></p>
          <?php endif; ?>
          <input
          <?php if (isset($errores["er_apellido"])): ?>
            class="mensaje_error input-form"
          <?php endif; ?>
          class="input-form" type="text" name="apellido" id="apellido"
          <?php if (($_POST) && isset($errores["er_apellido"])==false):?>
            value="<?php echo $_POST["apellido"]; ?>"
          <?php endif; ?>
          >

          <label for="email">Email </label>
          <?php if (isset($errores["er_email"])) :?>
            <p class="mensaje_error_par"><?php echo $errores["er_email"]  ?></p>
          <?php endif; ?>
          <?php if (isset($errores["er_email_inv"])) :?>
            <p class="mensaje_error_par"><?php echo $errores["er_email_inv"]  ?></p>
          <?php endif; ?>
          <input
          <?php if (isset($errores["er_email"]) || isset($errores["er_email_inv"])): ?>
            class="mensaje_error input-form"
          <?php endif; ?>
          class="input-form" type="email" name="email" id= "email"
          <?php if (($_POST) && isset($errores["er_mail_inv"])==false):?>
            value="<?php echo $_POST["email"]; ?>"
          <?php endif; ?>
          >
          <br>
          <label for="password">Contraseña</label>
          <?php if (isset($errores["er_pass"])) :?>
            <p class="mensaje_error_par"><?php echo $errores["er_pass"]  ?></p>
          <?php endif; ?>
          <?php if (isset($errores["er_pass_8"])) :?>
            <p class="mensaje_error_par"><?php echo $errores["er_pass_8"]  ?></p>
          <?php endif; ?>
          <input
          <?php if (isset($errores["er_pass"]) || isset($errores["er_pass_8"]) || isset($errores["er_pass_con"]) || isset($errores["er_pass_distintas"])): ?>
            class="mensaje_error input-form"
            placeholder="La contraseña no es válida"
          <?php endif; ?>
          class="input-form" placeholder="Mínimo 8 caracteres" type="password" name="password" id="password" value="">

          <label for="password-confirm">Confirmar contraseña</label>
          <?php if (isset($errores["er_pass_con"])) :?>
            <p class="mensaje_error_par"><?php echo $errores["er_pass_con"]  ?></p>
          <?php endif; ?>
          <?php if (isset($errores["er_pass_distintas"])) :?>
            <p class="mensaje_error_par"><?php echo $errores["er_pass_distintas"]  ?></p>
          <?php endif; ?>

          <input
          <?php if (isset($errores["er_pass"]) || isset($errores["er_pass_8"]) || isset($errores["er_pass_con"]) || isset($errores["er_pass_distintas"])): ?>
            class="mensaje_error input-form"
          <?php endif; ?>
          class="input-form" placeholder="Confirmar contraseña" type="password" name="password-confirm" id="password-confirm" value="">

         <div class="enviar_cancelar">
          <button class="button-form"  type="submit" name="button">Registrarme</button>
          <button class="button-form"  type="reset" name="button">Cancelar</button>
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
