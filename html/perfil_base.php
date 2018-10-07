<?php
include "funciones.php";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php  include "head.php"; ?>
    <title>CONCRETA</title>
  </head>
  <body>
    <div class="container_perfil">
    <?php include("header.php") ?>
    <section class="seccion_perfil">

     <div class="usuario_basico">
      <div class="nombre_foto">

        <form class="" action="index.html" method="post" enctype="multipart/form-data">
         <input class="cambiar_foto"  type="file" name="avatar" value="">
         <button type="submit" name="button"></button>
        </form>
         <?php if (noHayAvatar()): ?>
         <img class="foto_perfil" src="../img/Perfil_default.jpg" alt="">
          <?php endif; ?>
         <p class="txt_centrado"><?php
         /*traerlo después de la base de datos*/
         if ($_POST) {
         echo $_POST["nombre"] . " " . $_POST["apellido"];
         }
         else {
           echo "Nombre Apellido";
         }
          ?></p>
      </div>
      <div class="rubro_portada">
        <div class="">
          <select class="select rubro_seleccionar" name="RUBRO">
            <option value="null"  selected disabled>Selecciona rubro</option>
            <option value="alba">Albañeria</option>
            <option value="gas">Gas</option>
            <option value="elect">Electricidad</option>
            <option value="pisorevest">Pisos y Revestimientos</option>
            <option value="estruct">Estructura</option>
            <option value="transpor">Trasporte, Carga y Descarga</option>
          </select>
        </div>
      </div>
    </div>

    </section>

  <footer class="footer_perfil">
  <?php include("footer.php") ?>
  </footer>

   </div>
  </body>
</html>
