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
        <p>Zonas de trabajo: <?php echo convertirDatosZona($usuario)?></p>
      </div>
     </div>


     <div class="rubro_exp col_centrado">
       <div class="rubro">
       <h3>Rubro: <?php echo convertirDatosRubro($usuario);?></h3>
       </div>
       <div class="especialidades">
         <form class="col_izq" action="" method="post">
           <div class="esp">
            <input class="" type="checkbox" name="esp1" value="">
            <label for="esp1"><?php $especialidades = menuesRubro($usuario) ; echo $especialidades["esp1"] ?></label>
           </div>
           <div class="esp">
            <input class="" type="checkbox" name="esp1" value="">
            <label for="esp2"><?php echo $especialidades["esp2"] ?></label>
           </div>
           <div class="esp">
            <input class="" type="checkbox" name="esp1" value="">
            <label for="esp3"><?php echo $especialidades["esp3"] ?></label>
           </div>
           <div class="esp">
            <input class="" type="checkbox" name="esp1" value="">
            <label for="esp4"><?php echo $especialidades["esp4"] ?></label>
           </div>

          <button class="boton enviar" type="submit" name="button-profesional">Guardar cambios</button>
         </form>

       </div>


     </div>




    </section>

  <footer class="footer_perfil">
  <?php include("footer.php") ?>
  </footer>

   </div>
  </body>
</html>
