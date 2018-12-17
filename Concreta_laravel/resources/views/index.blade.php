@php
use App\Rubro;
use App\Especialidade;
  $rubros = App\Rubro::all();
  $especialidades = App\Especialidade::all();
@endphp

@extends('plantilla')


@section('contenido')


    <div class="container_home">

        <div class="h1-label">

                <h1 class="h1-home"> Buscá servicios <br> para tu hogar o empresa</h1>
            <form class="buscadorHome" action="/index" method="post">
              {{ csrf_field() }}
              <label class="label-home"  for="buscador">
                <input placeholder="Ej : plomeros zona Norte" id="buscador" style="cursor:pointer" type="text" name="buscador" value="">
              </label>
              <div class="buscadorDespHome oculto">
                <ul class="desplegablehome">
                  @foreach ($rubros as $rubro)
                    @if($rubro->NOMBRE_RUBRO != null)
                  <li class="padding2">
                    {{$rubro->NOMBRE_RUBRO}}
                  </li>
                   @endif
                  @endforeach

                </ul>
              </div>
            </form>
       </div>

   <section class="cuerpo">

              <p class="subtit"> Busca entre mas de 1000 trabajadores registrados y conseguí <strong>el mejor presupuesto </strong></p>

      <h2 class="tit-perf" >Perfiles Destacados</h2>

         <div class="perfiles" >


<div class="slider-perfiles">

  <button class="botonSlider botonAnterior hoverAmarillo " type="button" name="buttonsanterior"> < </button>

  @foreach ($profPromAlto as $profesional)
    <article class="art-perfiles artPerfilesIndex" style="display:none"  >
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
               <a href="/perfil/ver/{{$profesional->ID}} ">Ver mas</a>
         </div>
       </article>
  @endforeach


  <button class="botonSlider botonSiguiente hoverAmarillo " type="button" name="buttonsiguiente"> > </button>


</div>

<article class="art-perfiles crear-perfil">
     <div class="foto-nombre">
            <img class="cara-perf" src="/img_app/icono_constructor.png" alt="">
            <p class="nombre-perf">Creá Tu Perfil !</p>

            {{-- <img src="/img_app/cinco_estrellitas.png" alt="">--}}
     </div>
     <div class="datos-rubro-boton">
           <h2 class="rubro-perf">¿Prestás Servicios?</h2>
           <p class="perf-descript">CREANDO TU PERFIL EN CONCRETA PODÉS RECIBIR OFERTAS DE CLIENTES POTENCIALES, COTIZAR PRESUPUESTOS Y MUCHO MAS</p>
           <a href="/register">Ver mas</a>
     </div>
   </article>





        </div>

        <div class="publi-home">

          <div class="a-publi">
            <a href="#"> <img class="banner-decker" src="/img_publicidad/banner_black_decker.jpg" alt=""> </a>
          </div>


        </div>


      </section>




@endsection
