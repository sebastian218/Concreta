@php
  use App\User;
  use App\Mensaje;
  use App\Rubro;
  use App\Calificacione;
  use App\Especialidade;
  use App\Zona;
  if ($usuario->rubroPrincipal() != null){
    $id_r = $usuario->rubroPrincipal()->ID;
  }
  if ($usuario->rubroPrincipal() == null){
    $id_r = 0;
  }
  if ($usuario->rubroSecundario() != null){
    $id_rs = $usuario->rubroSecundario()->ID;
  }
  if ($usuario->rubroSecundario() == null){
    $id_rs = 0;
  }
  $zonasTodas = App\Zona::all();
  $rubrosTodos = App\Rubro::all();
@endphp

@extends('plantilla')

@section('contenido')
  <div class="banner_rubro">

  </div>

<div class="container">

  <div class="lateral_izq ">
    <div class="w90 center t50 flex column">
       <div class="blanco flex h10">
         <img class="icono" src="/img_app/logo_mensaje.png" alt="">
         <p class="txt_centrado px14 marginauto">Últimos Mensajes</p>
       </div>
       @foreach ($usuario->mensajesRecibidos as $mensaje)
      <div class="blanco flex column h15 margin3vh">
        <p class="px12 line_h_14 margin1">De: {{$emisor = $mensaje->emisor->USER_NAME}}</p>
        <p class="texto_gris px12 line_h_14 margin1">{{substr($mensaje->MENSAJE, 0, 70)}}...</p>
      </div>
       @endforeach
       <div class="blanco flex h10 margin3vh">
         <a class= "txt_centrado px14 marginauto" href="#">Ver todos mis mensajes</a>
       </div>
    </div>
  </div>

  <div class="cuerpo_central">

     <form class="" action="/perfil/log/{{$usuario->ID}}" method="post" enctype="multipart/form-data">
     {{ csrf_field() }}
     <input class="oculto" type="text" name="identificador" value="{{$usuario->ID}}">
   <div class="datos flex">
     <div class="foto_nombre flex column align_center t50">
       <div class="pic_perfil overflowNo">
         @if ($usuario->avatar == null)
           <img class="fotos_perf" src="/img_app/icono_casco.png" alt="">
         @else
          <img class="max_min_200px" src="/storage/{{$usuario->avatar}}" alt="">
         @endif
       </div>
       <label class="px12 t50" for="subir_foto">Cambiar Foto de Perfil</label>
       <input type="file" name="avatar" value="" id="subir_foto">

       <p class="txt_centrado margin1">{{$usuario->NOMBRE}} {{$usuario->APELLIDO}}</p>

       <div class="calificaciones flex column align_center">
         @if ($usuario->cantCalif() > 0)
          <div class="estrellitas flex">
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



      <div class="rubro_zona t50 flex column">


       @if ($usuario->esTrabajador == true)
        <div class="rub">

          <label class="seleccion_rub_zon" for="RUBRO_P"></label>
          @if ($usuario->rubroPrincipal() != null)
            <div class="flex flexStart">
             <p class="px20 bold margin1">{{$usuario->rubroPrincipal()->NOMBRE_RUBRO}}</p>
             <img id="mostrarRubroP" class="iconoPegado margin1 hoverBlanco" src="/img_app/cambiar_icon.png" alt="">
            </div>
          @else
             <p>Elegí un rubro:</p>
          @endif

            <div id="form_rubro_P" class=
            @if ($usuario->rubroPrincipal() != null)
              "oculto"
            @endif
            >

            <select class="select" name="RUBRO_P" >
              @foreach ($rubrosTodos as $rubro)
                <option value="{{$rubro->ID}}" {{$id_r == $rubro->ID ? 'selected' : '' }}>{{$rubro->NOMBRE_RUBRO}}</option>
              @endforeach
            </select>
              </div>
        </div>

        @if ($usuario->rubroSecundario() != null)
          <div class="flex flexStart">
          <p class="px16 texto_gris margin1">{{$usuario->rubroSecundario()->NOMBRE_RUBRO}}</p>
          <img id="mostrarRubroS" class="iconoPegado margin1 hoverBlanco" src="/img_app/cambiar_icon.png" alt="">
          </div>
        @endif

        @if ($usuario->rubroSecundario() == null)
          <p class="px 12 texto_gris boldHover" id="agregarRubroS">Agregar rubro secundario</p>
        @endif

          <div id="form_rubro_S" class="oculto">
          <label class="seleccion_rub_zon" for="RUBRO_S"></label>
          <select class="select" name="RUBRO_S">
            <option value="0">Elegir rubro secundario</option>
            @foreach ($rubrosTodos as $rubro)
              <option value="{{$rubro->ID}}" {{$id_r == $rubro->ID ? 'selected' : '' }}>{{$rubro->NOMBRE_RUBRO}}</option>
            @endforeach
          </select>
          </div>

        @if ($id_r != 0)
        <div class="especialidades">
          @foreach ($usuario->rubroPrincipal()->especialidades as $especifico)
            <p class="margin1">{{$especifico->nombre()}}</p>
          @endforeach
        </div>
        @endif

        <div class="zon">

          <div class="flex flexStart">
          <p class="px14 margin1">Zona de trabajo:</p>
          <img id="mostrarZonas" class="iconoPegado margin1 hoverBlanco" src="/img_app/cambiar_icon.png" alt="">
          </div>


        </div>
          <div class="zonas">
          @foreach ($zonasTodas as $zon)
            @php
              $esta = $zon->estaEn($zonas);
            @endphp
            <div class="zona_ch
            @if ($esta == false)
            oculto
            @endif
            "
            >
            <input class="zona_ch oculto" type="checkbox" name="zona[]" value="{{$zon->ID}}"
            @if ($esta == true)
              checked
            @endif
              >
            <label for="zona">{{$zon->NOMBRE_ZONA}}</label>
            </div>
          @endforeach
        </div>

        <div class="">
          <label for="descripcion">Descripción</label>
          <textarea name="descripcion" rows="8" cols="80"></textarea>
       </div>

      @endif

      </div>

   </div>
   <button class="margin1" type="submit" name="button">Guardar Cambios</button>
    </form>

   <div class="feed">

   </div>
  </div>

  <div class="lateral_der">

  </div>
</div>





@if ($usuario->cantCalif() > 0)
@for ($i=0; $i < $usuario->promedioInt(); $i++)
  <img class="logo_tipo" src="/img_app/Yellow_Star.png" alt="">
@endfor
<p>{{$usuario->promedio()}}/5 en base a {{$usuario->cantCalif()}} calificaciones</p>
@else
<p>No hay suficientes calificaciones</p>
@endif



<form class="" action="/perfil/log/{{$usuario->ID}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="file" name="avatar" value="">
<input class="oculto" type="text" name="identificador" value="{{$usuario->ID}}">
<button type="submit" name="button">Guardar Cambios</button>
</form>

@stop
