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
            <form class="buscadorHome" action="/buscadorPorPalabra" method="get">
              {{ csrf_field() }}
              {{--}}<label class="label-home"  for="busqueda_string">
              </label>{{---}}
              <input type="text" name="busqueda_string" placeholder="Ej : albañil Zona Oeste" id="buscador" style="cursor:pointer">
              <button class="oculto" type="submit" name="button">Buscar</button>
            </form>
       </div>

   <section class="cuerpo">

              <p class="subtit"> Busca entre mas de 1000 trabajadores registrados y conseguí <strong>el mejor presupuesto </strong></p>

      <h2 class="tit-perf" >Perfiles Destacados</h2>

         <div class="perfiles" >


<div class="slider-perfiles">

  <button class="botonSlider botonAnterior hoverAmarillo " type="button" name="buttonsanterior"> < </button>

  @foreach ($profPromAlto as $profesional)
    <div class="resultado flex t90 margin2vh artPerfilesIndex" style="display:none">

      <div class="foto_nombreSlide flex column align_center t50">
        <div class="pic_perfil overflowNo margin1 avatar150px">
          @if ($profesional->avatar == null)
            <img class="sin_avatar" src="/img_app/icono_casco.png" alt="">
          @else
           <img class="fotos_perf" src="/storage/{{$profesional->avatar}}" alt="">
          @endif
        </div>

        <p class="txt_centrado margin1">{{$profesional->NOMBRE}} {{$profesional->APELLIDO}}</p>

        <div class="calificaciones flex column align_center margin1">
          @if ($profesional->cantCalif() > 0)
           <div class="estrellitas flex margin1">
          @for ($i=0; $i < $profesional->promedioInt(); $i++)
            <img class="icono" src="/img_app/Yellow_Star.png" alt="">
          @endfor
           </div>

          <p class="txt_centrado px12 texto_gris">{{$profesional->promedio()}}/5 en base a {{$profesional->cantCalif()}} calificaciones</p>
          @else
          <p class="txt_centrado px12 texto_gris">No hay suficientes calificaciones</p>
          @endif
        </div>
       </div>

      <div class="zona_rubroSlide flex column margin1" style="justify-content:space-between;">
         <div class="rubros flex column t90">
           @if ($profesional->rubroPrincipal())
           <p class="px16 margin1">RUBRO PRINCIPAL:</p>
           <p class="px20 bold margin1">{{$profesional->rubroPrincipal()->NOMBRE_RUBRO}}</p>
           @endif
           @if ($profesional->rubroSecundario())
           <p class="px16 margin1">RUBRO SECUNDARIO:</p>
           <p class="px16 texto_gris margin1">{{$profesional->rubroSecundario()->NOMBRE_RUBRO}}</p>
           @endif
         </div>
         <div class="zon flex column t90">
           @if ($profesional->zonas)
           <p class="px16 margin1">ZONA DE TRABAJO:</p>
           @foreach ($profesional->zonas as $zona)
             <div class="">
               <p class="px14 margin1">.{{$zona->NOMBRE_ZONA}}</p>
             </div>
           @endforeach
          @endif
         </div>
         <div class="flex column t90">
           @if ($profesional->especialidades)
           <p class="px16 margin1">SUBRUBROS:</p>
           @foreach ($profesional->especialidades as $esp)
             <div class="">
               <p class="px14 italic margin1">.{{$esp->nombre}}</p>
             </div>
           @endforeach
         @endif
         </div>
         <div class="margin1 flex w100" style="justify-content:space-between;">

           <a href="/perfil/ver/{{$profesional->ID}}" class="fondoAmarillo padding1" >VER PERFIL</a>
         </div>
       </div>
    </div>

  @endforeach


  <button class="botonSlider botonSiguiente hoverAmarillo " type="button" name="buttonsiguiente"> > </button>


</div>

<article class="art-perfiles crear-perfil t50">
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
