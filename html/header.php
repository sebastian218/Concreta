<?php
require_once "funciones.php";

if (estaLogueado()) {
  $usuario = traerUsuarioLogueado();
  $_SESSION["usuario"] = $usuario["usuario"];

}
 ?>
<header class="header_completo">
  <nav class="barra_principal">
      <ul class="barra_ppal_2">
        <?php if (isset($_SESSION["usuario"])): ?>
          <li class="menu_registro"><a class="botones_registro" href="">Hola <?= $_SESSION["usuario"] ?></a></li>
          <li class="menu_registro"><a class="botones_registro" href="">CERRAR SESIÓN</a></li>
        <?php else:?>
       <li class="menu_registro"><a class="botones_registro" href="registracion_intermedio.php">CREAR CUENTA</a></li>
       <li class="menu_registro"><a class="botones_registro" href="login.php">INICIAR SESIÓN</a></li>
        <?php endif; ?>
      </ul>
      <ul class="barra_ppal_1">
        <li class="menu_contextual"><a class="botones_cambiar"href="#"><img class="hamburger"src="../img/Hamburger_icon.png" alt=""></a></li>
        <li class="logo_nombre"><a class="botones_cambiar"href="home.php"><img class="logo_tipo" src="../img/LOGO_FINAL.png" alt=""></a></li>
        <li class="busqueda"><a class="botones_cambiar" href="#"><img class="lupa" src="../img/search-icon-png-21.png" alt=""></a></li>
      </ul>
  </nav>

</header>
