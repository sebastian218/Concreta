@php
  use App\User;
  use App\Mensaje;
  use App\Rubro;
  use App\Calificacione;
  use App\Especialidade;
  use App\Zona;
  use App\Usuario_zona;

  $zonasTodas = App\Zona::all();
  $rubrosTodos = App\Rubro::all();
@endphp

@extends('plantilla')

@section('contenido')

  <div class="banner_rubro">
    <div class="banner_rubro">
      <img class = "a100" src="/img_app/textura_rubro_0.jpg" alt="">
    </div>
  </div>

<div class="container">

  <div class="lateral_izq">

    <form class="" action="/buscadorA" method="get">
      {{ csrf_field() }}

      <div class="buscar_basico flex column margin1 t90">

      <div class="buscar_rubro margin2vh">
      <label for="RUBRO_BUSCAR">ELEGÍ UN RUBRO:</label>
      <select class="select w100" name="id_rubro_buscado" >
         <option value='t'>Todos</option>
        @foreach ($rubrosTodos as $rubro)
          @if ($rubro->NOMBRE_RUBRO != null)
            <option value="{{$rubro->ID}}">{{$rubro->NOMBRE_RUBRO}}</option>
          @endif
        @endforeach
      </select>
      </div>

      <div class="buscar_zona margin2vh">
        <label for="ZONA_BUSCAR">ELEGÍ UNA ZONA:</label>
        <select class="select w100" name="id_zona_buscado">
            <option value="t">Todas</option>
          @foreach ($zonasTodas as $zona)
            <option value="{{$zona->ID}}">{{$zona->NOMBRE_ZONA}}</option>
          @endforeach
        </select>
        </div>

        <div class="buscar_esp flex column margin2vh">
          <p class="margin1">ELEGÍ UNO O MÁS SUBRUBROS:</p>

           @foreach ($rubrosTodos as $rubro)
             <div class="t90 borderBlack marginTop1 padding1">
            <p class="margin1 px14">{{$rubro->NOMBRE_RUBRO}}</p>
           @foreach ($rubro->especialidades as $esp)
           <div class="">
             <input type="checkbox" name="esp_buscadas[]" value="{{$esp->ID}}">
             <label class="px12" for="esp_buscadas">{{$esp->nombre}}</label>
           </div>
           @endforeach
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
    <form class="" action="/buscadorPorPalabra" method="get">
      {{ csrf_field() }}
      <div class="t90 padding2 margin1">
        <label for="busqueda_string">Buscar por palabras clave</label>
        <input type="text" name="busqueda_string" value="">
        <button type="submit" name="button">Buscar</button>
      </div>
    </form>
    <p class="txt_centrado fondoAmarillo margin2vh padding1">Hay {{$cantidad}} resultados para tu búsqueda</p>

    <div class="resultados flex column t50">
    @foreach ($usuarios as $usuario)
      <div class="resultado flex t90 margin2vh">

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

        <div class="zona_rubro flex column margin1" style="justify-content:space-between;">
           <div class="rubros flex column t90">
             @if ($usuario->rubroPrincipal())
             <p class="px16 margin1">RUBRO PRINCIPAL:</p>
             <p class="px20 bold margin1">{{$usuario->rubroPrincipal()->NOMBRE_RUBRO}}</p>
             @endif
             @if ($usuario->rubroSecundario())
             <p class="px16 margin1">RUBRO SECUNDARIO:</p>
             <p class="px16 texto_gris margin1">{{$usuario->rubroSecundario()->NOMBRE_RUBRO}}</p>
             @endif
           </div>
           <div class="zon flex column t90">
             @if ($usuario->zonas)
             <p class="px16 margin1">ZONA DE TRABAJO:</p>
             @foreach ($usuario->zonas as $zona)
               <div class="">
                 <p class="px14 margin1">.{{$zona->NOMBRE_ZONA}}</p>
               </div>
             @endforeach
            @endif
           </div>
           <div class="flex column t90">
             @if ($usuario->especialidades)
             <p class="px16 margin1">SUBRUBROS:</p>
             @foreach ($usuario->especialidades as $esp)
               <div class="">
                 <p class="px14 italic margin1">.{{$esp->nombre}}</p>
               </div>
             @endforeach
           @endif
           </div>
           <div class="margin1 flex w100" style="justify-content:space-between;">
             <a href="#" class="fondoAmarillo padding1">CONTACTAR</a>
             <a href="/perfil/ver/{{$usuario->ID}}" class="fondoAmarillo padding1" >VER PERFIL</a>
           </div>
         </div>


      </div>
    @endforeach

    <div class="paginas t90 margin2 padding1">
      @if (isset($id_r_buscado))
      {{$usuarios->appends(["id_rubro_buscado" => $id_r_buscado, "id_zona_buscado" => $id_z_buscado])->links('vendor.pagination.semantic-ui')}}
      @else
      {{$usuarios->links('vendor.pagination.semantic-ui')}}
      @endif
    </div>

    </div>

  </div>


  <div class="lateral_der">
    <div class="w90 center marginTop1">
       <img class= "publicid" src="/img_publicidad/acindar_1.jpg" alt="">
       <img class= "publicid" src="/img_publicidad/acindar_2.jpg" alt="">
       <img class= "publicid" src="/img_publicidad/acindar.png" alt="">
     </div>
  </div>

</div>

@stop
