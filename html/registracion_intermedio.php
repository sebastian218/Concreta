<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estilos_v2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>CONCRETA</title>
  </head>
  <body>
    <div class="container_reg_doble">
    <?php include("header.php") ?>
    <div class="banner_perfiles">
      <p class="crea_perfil">¿Trabajás en la construcción?<br>Creá tu perfil en concreta</p>
      <p class="perfil_registrate">¿Buscás servicios?<br>Registrate</p>

      </div>
    <section class="cuerpo_tablet">
        <div class="publicidad_vertical">
          <img class= "publicid" src="../img/acindar_1.jpg" alt="">
          <img class= "publicid" src="../img/acindar_2.jpg" alt="">
          <img class= "publicid" src="../img/acindar.png" alt="">
        </div>
      <section class="elegir_perfil">
        <div class="elegir_perfil_cliente">
          <img class="logo_perfil" src="../img/icono_cliente.png" alt="">
            <div class="parrafo_descrip_perfil">
          <p class="descrip">Quiero contactar profesionales y buscar servicios en mi área</p>
            </div>
          <a class="registrarme reg_prof" href="registracion.php"> REGISTRARME </a>
        </div>
        <div class="elegir_perfil_profesional">
          <img class="logo_perfil" src="../img/icono_constructor.png" alt="">
          <div class="parrafo_descrip_perfil">
            <p class="descrip">Quiero ofrecer servicios y recibir ofertas de trabajo</p>
          </div>
          <a class="registrarme reg_const", class="reg_const" href="registracion-profesional.php"> CREAR MI PERFIL </a>
        </div>
      </section>
      <div class="publicidad_vertical">
        <img class= "publicid" src="../img/acindar_1.jpg" alt="">
        <img class= "publicid" src="../img/acindar_2.jpg" alt="">
        <img class= "publicid" src="../img/acindar.png" alt="">
      </div>
    </section>
    </div>
    <?php include("footer.php") ?>
  </body>
</html>
