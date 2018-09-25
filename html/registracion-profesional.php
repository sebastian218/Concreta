<?php


include ("funciones.php");
  $errores = [];
$usernameDefault = "";
$nombreDefault = "";
$apellidoDefault = "";
$emailDefualt = "";
$dniDefualt = "";



  if ($_POST) {
    $usernameDefault = $_POST["usuario"];
    $nombreDefault = $_POST["nombre"];
    $apellidoDefault=$_POST["apellido"];
    $emailDefualt = $_POST["email"];
    $dniDefault = $_POST["DNI"];


    // Validar al  usuario
    $errores = validarUsuario($_POST);
    if (empty($errores)) {
      // Registrarlo
      $usuario = armarUsuario();
      crearUsuario($usuario);

      // Redirigir a la home
      header("location:home.php");exit;
    }
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estilos_v2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PERFIL PROFESIONAL</title>
  </head>
  <body>
    <div class="container_formularios_prof">
      <?php include("header.php") ?>
      <div class="banner_perfiles">
        <p class="crea_perfil">Creá tu perfil en Concreta</p>
        </div>
  <section>
   <div class="formularios">
      <form class="registracion" action="" method="POST" >
       <h1 class="registr-prof">Completá tus datos</h1>
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
           <input  class="input-form" placeholder="" type="text" name="email" id="usuario" value="<?= $emailDefualt ?>">
       <?php endif; ?>

       <label for="DNI">DNI</label>
       <?php if (isset($errores["DNI"])): ?>
          <input class="input-form error" type="text" name="DNI" id="DNI" value="" >
          <p class="p-error"> <?= $errores["DNI"]?></p>
          <?php else: ?>
            <input class="input-form" type="text" name="DNI" id="DNI" value="<?=$dniDefualt?>" >
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




      <div class="Registro">
         <h1 class= "registr-prof">Especificá tu rubro y zona de trabajo</h1>
        <label class="seleccion_rub_zon" for=""> ZONA DE TRABAJO </label>
               <?php if (isset($errores["zona"])): ?>
                 <div class="zona error">
                 <p class="p-error" ><?= $errores["zona"]?></p>
                 <input class="control" type="checkbox" name="zona" value="ZN">Zona Norte<br>
                 <input class="control" type="checkbox" name="zona" value="ZS">Zona Sur<br>
                 <input class="control" type="checkbox" name="zona" value="ZE">Zona Este<br>
                 <input class="control" type="checkbox" name="zona" value="ZO">Zona Oeste<br>
                 <input class="control"  type="checkbox" name="zona" value="ZC">Zona Centro<br>
               </div>
                 <?php else: ?>
                   <div class="zona">
                     <input class="control" type="checkbox" name="zona" value="ZN"
                       <?php if ($_POST): ?>
                       <?php if ($_POST["zona"] == "ZN"): ?>
                            checked
                       <?php endif; ?>
                       <?php endif; ?>>Zona Norte<br>
                     <input class="control" type="checkbox" name="zona" value="ZS"
                      <?php if ($_POST): ?>
                      <?php if ($_POST["zona"] == "ZS"): ?>
                           checked
                      <?php endif; ?>
                      <?php endif; ?>>Zona Sur<br>
                     <input class="control" type="checkbox" name="zona" value="ZE"
                      <?php if ($_POST): ?>
                      <?php if ($_POST["zona"] == "ZE"): ?>
                           checked
                      <?php endif; ?>
                      <?php endif; ?>>Zona Este<br>
                     <input class="control" type="checkbox" name="zona" value="ZO"
                      <?php if ($_POST): ?>
                      <?php if ($_POST["zona"] == "ZO"): ?>
                           checked
                      <?php endif; ?>
                      <?php endif; ?>>Zona Oeste<br>
                     <input class="control"  type="checkbox" name="zona" value="ZC"
                      <?php if ($_POST): ?>
                      <?php if ($_POST["zona"] == "ZC"): ?>
                           checked
                      <?php endif; ?>
                      <?php endif; ?>>Zona Centro<br>
                   </div>

               <?php endif; ?>



        <label class="seleccion_rub_zon" for="RUBRO"> RUBRO PRINCIPAL </label>
        <?php if (isset($errores["RUBRO"])): ?>
          <p class="p-error"><?=$errores["RUBRO"]?></p>
          <select class="select error" name="RUBRO">
            <option value="null"  selected disabled>Selecciona rubro</option>
            <option value="alba">Albañeria</option>
            <option value="gas">Gas</option>
            <option value="elect">Electricidad</option>
            <option value="pisorevest">Pisos y Revestimientos</option>
            <option value="estruct">Estructura</option>
            <option value="transpor">Trasporte, Carga y Descarga</option>
          </select>
          <?php else: ?>
            <select class="select" name="RUBRO">
              <option value="null"  selected disabled>Selecciona rubro</option>
              <option value="alba">Albañeria</option>
              <option value="gas">Gas</option>
              <option value="elect">Electricidad</option>
              <option value="pisorevest">Pisos y Revestimientos</option>
              <option value="estruct">Estructura</option>
              <option value="transpor">Trasporte, Carga y Descarga</option>
            </select>
        <?php endif; ?>
         <div class="enviar_cancelar">
          <button class="button-form" type="submit" name="button-profesional">Enviar</button>
          <br>
          <button class="button-form" type="reset" name="button">Cancelar</button>
         </div>
     </div>
        </form>
      </div>
    </section>
   <footer>
   <?php include("footer.php") ?>
   </footer>
  </body>
</html>
