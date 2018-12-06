
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

   <div class="datos flex">
     <div class="foto_nombre flex column align_center t50">
       <div class="pic_perfil overflowNo">
         @if ($usuario->avatar == null)
           <img class="fotos_perf" src="/img_app/icono_casco.png" alt="">
         @else
          <img class="max_min_200px" src="/storage/{{$usuario->avatar}}" alt="">
         @endif
       </div>

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
        <div class="rub">
          <p class="px20">{{$usuario->rubroPrincipal()->NOMBRE_RUBRO}}</p>
          @if ($usuario->rubroSecundario() != null)
            <p class="px14 texto_gris">{{$usuario->rubroSecundario()->NOMBRE_RUBRO}}</p>
          @endif
        </div>
        <div class="zon">
          <p class="px16">Área de trabajo:</p>
          <p class="px14 texto_gris">
          @foreach ($zonas as $zona)
               {{$zona->NOMBRE_ZONA . " "}}
          @endforeach
          </p>

        </div>

      </div>

   </div>

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
