

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
        <p class="crea_perfil">CREÁ TU PERFIL EN CONCRETA</p>
        </div>
  <section>
   <div class="formularios">
      <form class="registracion" action="" method="POST" >
       <h1 class="registr-prof">Completá tus datos</h1>
      <label for="usuario"> Usuario</label>
      <input class="input-form" type="text" name="usuario" id="usuario" value="Elegir nombre de usuario">
      <label  for="nombre"> Nombre</label>
      <input class="input-form" type="text" name="nombre" id="nombre" value="">
      <label for="apellido"> Apellido </label>
      <input class="input-form" type="text" name="apellido" id="apellido" value="">
      <label for="email"> Email </label>
      <input class="input-form" type="email" name="email" id= "email" value="">
      <label for="DNI">DNI</label>
      <input class="input-form" type="text" name="DNI" id="DNI" value="" required>

      <label for=""> Password </label>
      <input class="input-form" type="password" name="password" id= "password" value="">
      <label for=""> Confirmar Password </label>
      <input class="input-form" type="password" name="password-confirm" id= "password-confirm" value="">



      <div class="Registro">
         <h1 class= "registr-prof">Especificá tu rubro y zona de trabajo</h1>
        <label class="seleccion_rub_zon" for=""> ZONA DE TRABAJO </label>
          <div class="zona">
            <input class="control" type="checkbox" name="zona[]" value="ZN">Zona Norte<br>
            <input class="control" type="checkbox" name="zona[]" value="ZS">Zona Sur<br>
            <input class="control" type="checkbox" name="zona[]" value="ZE">Zona Este<br>
            <input class="control" type="checkbox" name="zona[]" value="ZO">Zona Oeste<br>
            <input class="control"  type="checkbox" name="zona[]" value="ZC">Zona Centro<br>
          </div>

        <label class="seleccion_rub_zon" for="RUBRO"> RUBRO PRINCIPAL </label>
          <select class="select" name="RUBRO">
            <option value="alba">Albañeria</option>
            <option value="gas">Gas</option>
            <option value="elect">Electricidad</option>
            <option value="pisorevest">Pisos y Revestimientos</option>
            <option value="estruct">Estructura</option>
            <option value="transpor">Trasporte, Carga y Descarga</option>
          </select>

         <div class="enviar_cancelar">
          <button class="button-form" type="submit" name="button">Enviar</button>
          <br>
          <button class="button-form" type="reset" name="button">Cancelar</button>
         </div>

        </form>

    </section>
   <footer>
   <?php include("footer.php") ?>
   </footer>
  </div>
  </body>
</html>
