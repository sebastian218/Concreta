@php
  use App\User;
  use App\Mensaje;
  use App\Rubro;
  use App\Calificacione;
  use App\Especialidade;
  use App\Zona;

  $zonasTodas = App\Zona::all();
  $rubrosTodos = App\Rubro::all();
@endphp

@extends('plantilla')

@section('contenido')

  <div class="banner_rubro">

  </div>

<div class="container">

  <div class="lateral_izq">

    <form class="" action="/buscador" method="post">
      {{ csrf_field() }}

      <div class="buscar_basico flex column margin1">

      <div class="buscar_rubro margin2vh">
      <label for="RUBRO_BUSCAR">Elegí un rubro:</label>
      <select class="select" name="RUBRO_BUSCAR" >
        @foreach ($rubrosTodos as $rubro)
          <option value="{{$rubro->ID}}">{{$rubro->NOMBRE_RUBRO}}</option>
        @endforeach
      </select>
      </div>

      <div class="buscar_zona flex column margin2vh">
        <p>Elegí una o más zonas:</p>
        @foreach ($zonasTodas as $zon)
          <div class="">
          <input class="" type="checkbox" name="zona_buscar[]" value="{{$zon->ID}}">
          <label for="zona_buscar">{{$zon->NOMBRE_ZONA}}</label>
          </div>
        @endforeach
      </div>

     </div>

     <div class="botones margin2vh">
       <button type="button" name="button">Borrar</button>
       <button type="submit" name="button">Buscar</button>
     </div>

    </form>
  </div>


  <div class="cuerpo_central">
    <p class="txt_centrado">Hay {{$cantidad}} resultados</p>

    <div class="resultados flex column">
    @foreach ($usuarios as $usuario)
      <div class="resultado flex t50">

        <div class="foto_nombre flex column align_center t50">
          <div class="pic_perfil overflowNo margin1 avatar150px">
            @if ($usuario->avatar == null)
              <img class="sin_avatar" src="/img_app/icono_casco.png" alt="">
            @else
             <img class="fotos_perf" src="/storage/{{$usuario->avatar}}" alt="">
            @endif
          </div>

          <p class="txt_centrado margin1">{{$usuario->NOMBRE}} {{$usuario->APELLIDO}}</p>

          <div class="calificaciones flex column align_center margin1">
            @if ($usuario->cantCalif() > 0)
             <div class="estrellitas flex margin1">
            @for ($i=0; $i < $usuario->promedioInt(); $i++)
              <img class="icono" src="/img_app/Yellow_Star.png" alt="">
            @endfor
             </div>

            <p class="txt_centrado px12 texto_gris">{{$usuario->promedio()}}/5 en base a {{$usuario->cantCalif()}} calificaciones</p>
            @else
            <p class="txt_centrado px12 texto_gris">No hay suficientes calificaciones</p>
            @endif
          </div>
         </div>

         <div class="">

         </div>
        <div class="zona_rubro">
           <div class="rubros flex column t50">
             @if ($usuario->rubroPrincipal())
             <p>{{$usuario->rubroPrincipal()->NOMBRE_RUBRO}}</p>
             @endif
             @if ($usuario->rubroSecundario())
             <p>{{$usuario->rubroSecundario()->NOMBRE_RUBRO}}</p>
             @endif
           </div>

         </div>

      </div>
    @endforeach
    <div class="paginas flex t50">
      {{$usuarios->links()}}
    </div>

    </div>

  </div>


  <div class="lateral_der">

  </div>

</div>

@stop
