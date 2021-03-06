<?php
require_once("init.php");

  $errores = [];
$usernameDefault = "";
$nombreDefault = "";
$apellidoDefault = "";
$emailDefault = "";
$dniDefault = "";



  if ($_POST) {
    $usernameDefault = $_POST["usuario"];
    $nombreDefault = $_POST["nombre"];
    $apellidoDefault=$_POST["apellido"];
    $emailDefault = $_POST["email"];
    $dniDefault = $_POST["DNI"];


    // Validar al  usuario
    $errores = $validator->validarUsuario($_POST);
    if (empty($errores)) {
      // Registrarlo
      $usuario = new Profesional($_POST);
      $db->crearUsuarioProfesional($usuario);

       //subir archivo
       $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
       move_uploaded_file($_FILES["avatar"]["tmp_name"], "../img-usuarios/".trim($_POST["email"]).".".$ext);

      // Redirigir a la home
      header("location:home.php");exit;
    }
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php  include "head.php"; ?>
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
      <form class="registracion" action="" method="POST" enctype="multipart/form-data" >
        <div class="registro_general borde_redondeado">

       <h1 class="registr-prof">Completá tus datos</h1>
       <label for="usuario"> Usuario</label>
       <?php if (isset($errores["usuario"])): ?>
         <input  class="input-form error" placeholder="" type="text" name="usuario" id="usuario" value="">
         <p class="p-error" ><?=$errores["usuario"]?></p>
         <?php else: ?>
           <input  class="input-form" placeholder="" type="text" name="usuario" id="usuario" value="<?= $usernameDefault ?>">
       <?php endif; ?>

       <label for="avatar">Elegi tu foto de Perfil</label>

          <?php if (isset($errores["avatar"])): ?>
            <input class="input-form error"  type="file" name="avatar" value="">
            <p class="p-error"><?=$errores["avatar"]?></p>
            <?php else: ?>
            <input  type="file" name="avatar" value="">
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

       <label for="DNI">DNI</label>
       <?php if (isset($errores["DNI"])): ?>
          <input class="input-form error" type="text" name="DNI" id="DNI" value="" >
          <p class="p-error"> <?= $errores["DNI"]?></p>
          <?php else: ?>
            <input class="input-form" type="text" name="DNI" id="DNI" value="<?=$dniDefault?>" >
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
              </div>

      <div class="Registro borde_redondeado">
         <h1 class= "registr-prof">Especificá tu zona de trabajo y tu rubro</h1>
        <label class="seleccion_rub_zon" for=""> ZONA DE TRABAJO </label>
               <br>

               <?php if (isset($errores["zona"])): ?>
                 <p class="p-error" ><?= $errores["zona"]?></p>
                 <div class="zona error">
                 <input class="control" type="checkbox" name="zona[]" value="1">Zona Norte<br>
                 <br>
                 <input class="control" type="checkbox" name="zona[]" value="2">Zona Sur<br>
                 <br>
                 <input class="control" type="checkbox" name="zona[]" value="3">Zona Oeste<br>
                 <br>
                 <input class="control"  type="checkbox" name="zona[]" value="4">Zona Centro<br>
                 <br>
               </div>
                 <?php else: ?>
                   <div class="zona">
                     <input class="control" type="checkbox" name="zona[]" value="1"
                       <?=($_POST && $_POST["zona"] == "ZN") ? "checked" : ""?>>Zona Norte<br>
                       <br>
                     <input class="control" type="checkbox" name="zona[]" value="2"
                      <?=($_POST && $_POST["zona"] == "ZS") ? "checked" : ""?>>Zona Sur<br>
                      <br>
                     <input class="control" type="checkbox" name="zona[]" value="3"
                      <?=($_POST && $_POST["zona"] == "ZO") ? "checked" : ""?>>Zona Oeste<br>
                    <br>
                     <input class="control"  type="checkbox" name="zona[]" value="4"
                      <?=($_POST && $_POST["zona"] == "ZC") ? "checked" : ""?>>Zona Centro<br>
                      <br>
                   </div>

               <?php endif; ?>



        <label class="seleccion_rub_zon" for="RUBRO"> RUBRO PRINCIPAL </label>
        <?php if (isset($errores["RUBRO"])): ?>
          <p class="p-error"><?=$errores["RUBRO"]?></p>
          <select class="select error" name="RUBRO">
            <option value="null"  selected disabled>Selecciona un rubro</option>
            <option value="1">Albañilería</option>
            <option value="2">Gas</option>
            <option value="3">Electricidad</option>
            <option value="4">Pisos y Revestimientos</option>
            <option value="5">Estructuras</option>
            <option value="6">Trasporte, Carga y Descarga</option>
          </select>
          <?php else: ?>
            <select class="select" name="RUBRO">
              <option value="null"  selected disabled>Selecciona un rubro</option>
              <option value="1">Albañilería</option>
              <option value="2">Gas</option>
              <option value="3">Electricidad</option>
              <option value="4">Pisos y Revestimientos</option>
              <option value="5">Estructuras</option>
              <option value="6">Trasporte, Carga y Descarga</option>
            </select>
        <?php endif; ?>
     </div>
       <div class="enviar_cancelar">
         <button class="boton" type="reset" name="button">Cancelar</button>
           <br>
        <button class="boton enviar" type="submit" name="button-profesional">Enviar</button>
       </div>
        </form>
      </div>
    </section>
   <footer>
   <?php include("footer.php") ?>
   </footer>
  </body>
</html>
