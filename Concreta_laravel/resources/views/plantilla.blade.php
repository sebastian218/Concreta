<!DOCTYPE html>
@php
use App\Rubro;
use App\Especialidade;
  $rubros = App\Rubro::all();
  $especialidades = App\Especialidade::all();
@endphp
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
      <li class="menu_registro"><a class="botones_registro" href="/perfil/log/{{Auth::user()->ID}}"><i class="far fa-user"></i>  {{Auth::user()->USER_NAME}} </a></li>
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
    <li class="menu_contextual hamburIcon" id="hamburger"><a class="botones_cambiar" style="cursor:pointer"><img class="hamburger"src="/img_app/Hamburger_icon.png" alt=""></a></li>
    <li class="logo_nombre"><a class="botones_cambiar"href="/index"><img class="logo_tipo" src="/img_app/LOGO_FINAL.png" alt=""></a></li>
    <li class="busqueda lupaIcon"><a class="botones_cambiar" href="#"><img class="lupa" src="/img_app/search-icon-png-21.png" alt=""></a></li>
  </ul>
</nav>

    <div class="hamburgDesp  oculto">
      <ul class="desplegableHamubr oculto">
        @php
          if (Auth::check()) {
          $id = Auth::user()->ID;
         }
          else {$id = null;}
        @endphp

        @if (url()->current() == ("http://localhost:8000/perfil/log/" . $id))

        <li class="padding2 px12" id="ver_trabajos">Mis trabajos</li>
        <li class="padding2 px12" id="ver_posteos">Feed Clasificados</li>
        <li class="padding2 px12" id="ver_mensajes_barra">Mis mensajes</li>
       @endif

        @if(Auth::check())
          <a class="padding2 px12" href="/perfil/log/{{Auth::user()->ID}}">Mi perfil</a>
          <li class="padding2"><a class="px12"href="/muro">
          Muro de Búsquedas
          </a></li>
        @endif  

      </ul>
    </div>

<div class="lupaDesp oculto">
  <ul class="desplegableLupa">
    <li>
    <form class="" action="/buscadorPorPalabra" method="get">
      {{ csrf_field() }}
      <div class="padding1 margin1">
        <label class="oculto" for="busqueda_string"></label>
        <input type="text" style="width:90%; border:none;" class="fondoAmarillo" name="busqueda_string" value="" placeholder="Buscar...">
      {{--}}  <button type="submit" name="button"><img class="lupa" src="/img_app/search-icon-png-21.png" alt=""></button>{{----}}
      </div>
    </form>
    </li>
    <li class="padding2"><a class="px12"href="/buscador">
    Búsqueda Avanzada
    </a></li>
    <li class="padding2"><a class="px12"href="/muro">
    Muro de Búsquedas
    </a></li>

  </ul>
</div>


</header>

   <section>
     @yield('contenido')
   </section>




<footer>
  <ul class="footer_alto" style ="margin-top:3vh;">

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
