@extends('plantilla')


@section('contenido')


    <div class="container_home">

        <div class="h1-label">

                <h1 class="h1-home"> Buscá servicios <br> para tu hogar o empresa</h1>
            <form class="buscadorHome" action="/index" method="post">
              {{ csrf_field() }}
              <label class="label-home"  for="buscador">
                <input placeholder="Ej : Plomeros Zona Oeste" id="buscador" type="text" name="buscador" value="">
                <input type="hidden" name="enviar" value="">
              </label>
            </form>
       </div>

   <section class="cuerpo">

              <p class="subtit"> Busca entre mas de 1000 trabajadores registrados y conseguí <strong>el mejor presupuesto </strong></p>
      <h2 class="tit-perf" >Perfiles</h2>

         <div class="perfiles" >

           <article class="art-perfiles crear-perfil">
                <div class="foto-nombre">
                       <img class="cara-perf" src="/img_app/icono_constructor.png" alt="">
                       <p class="nombre-perf">Creá Tu Perfil !</p>
                       <img src="/img_app/cinco_estrellitas.png" alt="">
                </div>
                <div class="datos-rubro-boton">
                      <h2 class="rubro-perf">¿Prestás Servicios?</h2>
                      <p class="perf-descript">CREANDO TU PERFIL EN CONCRETA PODÉS RECIBIR OFERTAS DE CLIENTES POTENCIALES, COTIZAR PRESUPUESTOS Y MUCHO MAS</p>
                      <a href="/register">Ver mas</a>
                </div>
              </article>

           @foreach ($profPromAlto as $profesional)
             <article class="art-perfiles">
                  <div class="foto-nombre">
                         <img class="cara-perf" src="/img_usuarios/{{$profesional->avatar}}" alt="">
                         <p class="nombre-perf">{{$profesional->NOMBRE}}</p>


                          <div class="calificStars"  style="display:flex">

                            @for ($i=0; $i < $profesional->promedioInt(); $i++)
                              <img class="icono" src="/img_app/Yellow_Star.png" alt="">
                            @endfor

                          </div>

                  </div>
                  <div class="datos-rubro-boton">
                        <h2 class="rubro-perf">{{$profesional->rubroPrincipal()["NOMBRE_RUBRO"]}}</h2>
                        <p class="perf-zona"> <!-- todavía no se como acceder a el nombre de las zonas del usuario -->   </p>
                        <p class="perf-descript">{{$profesional->descripcion}}</p>
                        <a href=" {{-- Acá deberia enviarnos a una pagina de detalle del Trabajador....Queda definir --}} ">Ver mas</a>
                  </div>
                </article>
           @endforeach

        </div>

        <div class="publi-home">

          <div class="a-publi">
            <a href="#"> <img class="banner-decker" src="/img_publicidad/banner_black_decker.jpg" alt=""> </a>
          </div>


        </div>

      </section>




@endsection
