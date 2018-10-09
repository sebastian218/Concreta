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

    <section class="seccion_perfil col_centrado">

     <div class="datos_basicos col_centrado">

      <div class="avatar">
      <img class="avatar" src="../img-usuarios/<?php  echo $usuario["email"]?>.jpg" alt="">
      </div>
      <div class="nombre_apellido">
        <p><?php echo $usuario["nombre"] . " " . $usuario["apellido"] ?></p>
      </div>
      <div class="puntaje col_centrado">
        <img class="puntaje" src="../img/cinco_estrellitas.png" alt="">
        <p class="letra_chica">Basado en x calificaciones</p>
      </div>
      <div class="zona col_centrado">
        <p>Zonas de trabajo</p>
        <p><?php echo $usuario["zona"]?></p>
      </div>
     </div>


     <div class="rubro_exp col_centrado">
       <div class="rubro">
       <h3><?php
       echo convertirDatosRubro($usuario);
       ?></h3>
       </div>


     </div>




    </section>

  <footer class="footer_perfil">
  <?php include("footer.php") ?>
  </footer>

   </div>
  </body>
</html>
