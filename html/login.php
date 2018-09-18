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
    <div class="container_login">
      <?php include("header.php") ?>
      <div class="banner_perfiles">
     <p class="perfil_registrate">¿Buscás servicios?<br>Registrate</p>
     </div>
      <section >
        <div class="Registro">
          <form class="login" action="" method="">
            <label for="usuario"> Usuario</label>
            <input class="input-form" type="text" name="usuario" id="usuario" value="">
            <label for="pasword"> Contraseña </label>
            <input class="input-form"  type="password" name="password" id= "password" value="">
            <br>

            <button class="button-form" type="submit" name="button">Iniciar Sesión</button>
            <br>
            <button class="button-form" type="reset" name="button">Cancelar</button>
          </form>


        </div>
      </section>
      <footer class="footer_login">
      <?php include("footer.php") ?>
      </footer>
    </div>

  </body>
</html>
