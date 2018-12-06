<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>

    <title>@yield('title')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/estilos_v2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script type="text/javascript" src="/js/concreta.js">

    </script>
  </head>
  <body>
    <header class="header_completo">
<nav class="barra_principal">
  <ul class="barra_ppal_2">
    @if (Auth::check())
      <li class="menu_registro"><a class="botones_registro" href="perfil_base.php"><i class="far fa-user"></i>  {{Auth::user()->USER_NAME}} </a></li>
      <li class="menu_registro"><a class="botones_registro" href="{{ route('logout') }}"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">CERRAR SESIÓN</a></li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
  @else
   <li class="menu_registro"><a class="botones_registro" href="/register">CREAR CUENTA</a></li>
   <li class="menu_registro"><a class="botones_registro" href="/login">INICIAR SESIÓN</a></li>
 @endif
  </ul>
  <ul class="barra_ppal_1">
    <li class="menu_contextual"><a class="botones_cambiar"href="#"><img class="hamburger"src="/img_app/Hamburger_icon.png" alt=""></a></li>
    <li class="logo_nombre"><a class="botones_cambiar"href="/index"><img class="logo_tipo" src="/img_app/LOGO_FINAL.png" alt=""></a></li>
    <li class="busqueda"><a class="botones_cambiar" href="#"><img class="lupa" src="/img_app/search-icon-png-21.png" alt=""></a></li>
  </ul>
</nav>
</header>

   <section>
     @yield('contenido')
   </section>




<footer>
  <ul class="footer_alto">
    <li class=links_footer>Lorem</li>
    <li class=links_footer>impsum</li>
    <li class=links_footer>dolor</li>
    <li class=links_footer>amet</li>
  </ul>

  <ul class="footer_chico">
    <li><a class="links_footer" href="#">Quiénes Somos</a></li>
    <li><a class="links_footer_tablet" href="#">Contáctenos</a></li>
    <li><a class="links_footer_tablet" href="#">F.A.Q.</a></li>
    <li><a class="links_footer_tablet" href="#">Cookies</a></li>
    <li><a class="links_footer" href="#">Política de privacidad</a></li>
  </ul>
</footer>





  </body>
</html>
