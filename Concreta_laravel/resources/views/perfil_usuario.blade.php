
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
  $posteosP = $usuario->traerPosteosRubroP();
  $trabajos= $usuario->trabajosPorUsuario();
@endphp

@extends('plantilla')

@section('contenido')
  <div class="banner_rubro">
    <img class = "a100" src="/img_app/textura_rubro_{{$id_r}}.jpg" alt="">
  </div>

<div class="container">

  <div class="lateral_izq ">
    @if($soloVista == false)
    <div class="w90 center t50 flex column">
       <div class="blanco flex h10">
         <div class="flex" style="width: 25%;">
         <img class="padding1 center" style="width:60%" src="/img_app/logo_mensaje.png" alt="">
         </div>
         <div class="bordeLateral flex">
         <p class="txt_centrado px14 center padding1 bold">Últimos Mensajes</p>
         </div>
       </div>
       @foreach ($usuario->mensajesRecibidos as $mensaje)
      <div class="blanco flex column h15 margin1">
        <p class="px12 line_h_14 padding1 margin0 bordeAbajo">De: {{$emisor = $mensaje->emisor->USER_NAME}}</p>
        <p class="texto_gris px12 line_h_14 padding1 margin0">{{substr($mensaje->MENSAJE, 0, 70)}}...</p>
      </div>
       @endforeach
       <div class="blanco flex h10 margin3vh">
         <a class= "txt_centrado px14 marginauto" href="#">Ver todos mis mensajes</a>

       </div>
       <div class="blanco flex h10 margin3vh botonDesplegarFormTrabajos hoverAmarillo" style="cursor:pointer" >
         <a class= "txt_centrado px14 marginauto bold" >Cargar nuevo trabajo realizado</a>
       </div>

       <div class="formPosteoTrabajos t90 oculto padding1">
         <form class="postearTrabajos" action="/perfil/log/trabajos/{{$usuario->ID}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
           <input class="oculto" type="text" name="identificador" value="{{$usuario->ID}}">
           <label for="texto">Descripción :</label>
           <textarea class="w100" name="textoTrabajo" rows="8" cols="20" placeholder="Agregá una breve descripción del trabajo realizado"></textarea>
           <p class="px12">Añadí hasta cuatro imágenes del trabajo realizado:</p>
           <div class="mostrar_">
             @for ($i=0; $i < 4; $i++)
               <p class="signosMas" style="cursor:pointer" id="mostrar_{{$i}}">+</p>
               <input class="oculto seleccionar" type="file" name="fotosTrabajos[]" value="" id="foto_mostrar_{{$i}}">
             @endfor
           </div>
                    <div class="botonesMuroPosteo">
                    <button class=" hoverAmarillo" type="reset" name="button"style="cursor:pointer"  >Borrar</button>
                     <button class=" hoverAmarillo enviarTrabajos" type="submit" name="button"style="cursor:pointer" >Enviar</button>
                    </div>

         </form>
       </div>
       <div class="blanco flex h10 margin3vh">
         <a class="txt_centrado px14 marginauto bold" id="misTrabajos" style="cursor:pointer">Mis trabajos realizados</a>
       </div>

    </div>
    @endif


  </div>

  <div class="cuerpo_central">
      @if (session("status"))
        <div class="fondoAmarillo padding1">
          <p class="txt_centrado">{{session("status")}}</p>
        </div>
      @endif
     <form class="" action="/perfil/log/{{$usuario->ID}}" method="post" enctype="multipart/form-data">
     {{ csrf_field() }}
     <input class="oculto" type="text" name="identificador" value="{{$usuario->ID}}">

   <div class="datos flex t90 ">
     <div class="foto_nombre flex column align_center t50">
       <div class="pic_perfil overflowNo">
         @if ($usuario->avatar == null)
           <img class="sin_avatar" src="/img_app/icono_casco.png" alt="">
         @else
          <img class="my-image" id="item" src="/storage/{{$usuario->avatar}}" />

         @endif
       </div>
       @if ($soloVista == false)
       <label class="px12 t50" for="subir_foto">Cambiar Foto de Perfil</label>
       <input class="oculto" type="file" name="avatar" value="" id="subir_foto">
       @endif

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

     <div class="container_rubros column flex bordeNegro padding1 blanco" style="width:80%; margin-top:3vh; margin-right:2vw;">

        <div class="rub">
          <p class="px12 margin0" style="margin-bottom:-1.5vh; margin-left:1vh;">RUBRO PRINCIPAL:</p>
          <label class="seleccion_rub_zon oculto" for="RUBRO_P"></label>
          @if ($usuario->rubroPrincipal() != null)
            <div class="flex align_center" style="margin-bottom:2vh;">
             <p class="px20 bold margin1">{{$usuario->rubroPrincipal()->NOMBRE_RUBRO}}</p>
             @if ($soloVista == false)
             <img id="mostrarRubroP" class="hoverAmarillo manoHover icono" src="/img_app/cambiar_icon.png" alt="">
            @endif
            </div>

            @else
               @if ($soloVista == false)
             <p>Elegí un rubro principal:</p>
               @else
             <p>No hay Rubro Principal</p>
               @endif
            @endif

               @if ($soloVista == false)
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
                @endif
        </div>

        @if ($usuario->rubroSecundario() != null)
          <p class="px12 margin0" style="margin-bottom:-1.5vh; margin-left:1vh;">RUBRO SECUNDARIO:</p>
          <div class="flex align_center" style="margin-bottom:2vh;">
          <p class="px16 texto_gris margin1">{{$usuario->rubroSecundario()->NOMBRE_RUBRO}}</p>
         @if ($soloVista == false)
          <img id="mostrarRubroS" class="icono hoverAmarillo manoHover opacity50" src="/img_app/cambiar_icon.png" alt="">
         @endif
          </div>
        @endif

        @if ($usuario->rubroSecundario() == null && $soloVista == false)
          <p class="px 12 texto_gris italic boldHover manoHover" id="agregarRubroS">Agregar rubro secundario</p>
        @endif

          <div id="form_rubro_S" class="oculto">
          <label class="seleccion_rub_zon oculto" for="RUBRO_S"></label>
          <select class="select" name="RUBRO_S">
            <option value="0">Elegir rubro secundario</option>
            @foreach ($rubrosTodos as $rubro)
            <option value="{{$rubro->ID}}" {{$id_rs == $rubro->ID ? 'selected' : '' }}>{{$rubro->NOMBRE_RUBRO}}</option>
            @endforeach
          </select>
          </div>


        <div class="e">
          <div class="especialidades">
            <div class="flex align_center">
              <p class="px16 margin1">SUBRUBROS:</p>
              @if ($soloVista == false)
              <img id="mostrarEsp_1" class="icono hoverAmarillo manoHover" src="/img_app/cambiar_icon.png" style="max-height:3vh;" alt="">
              @endif
            </div>

            <div class="">
              @foreach (Especialidade::all() as $esp)
                @php
                  $esta = $esp->estaEn($usuario->especialidades);
                @endphp
                <div class="
                @if ($esta == false)
                oculto mostrar_esp
                @endif
                "
                >
                <input class="oculto mostrar_esp" type="checkbox" name="especialidades[]" value="{{$esp->ID}}"
                @if ($esta == true)
                  checked
                @endif
                  >
                <label class="px14 italic" style="margin-left:1vw;" for="especialidades">{{$esp->nombre}}</label>
                </div>
              @endforeach

            </div>

          </div>
        </div>


     </div>

     <div class="container_zonas column flex bordeNegro padding1 blanco" style="width:80%; margin-top:2vh; margin-right:2vw; margin-bottom:2vh;">

        <div class="zon">
          <div class="flex flexStart align_center">
          <p class="px16 margin1">ZONA DE TRABAJO:</p>
          @if ($soloVista == false)
          <img id="mostrarZonas" class="icono hoverAmarillo manoHover" style="max-height:3vh;" src="/img_app/cambiar_icon.png" alt="">
          @endif
          </div>
        </div>

        <div class="zonas_usu zona_ch">
          @foreach ($zonas as $zon)
            <p class="px16 margin1" style="margin-left:2vh;">{{$zon->NOMBRE_ZONA}}</p>
          @endforeach
        </div>

        <div class="zonas_form zona_ch
          @if ($usuario->zonas =! null)
            oculto
          @endif
           ">
          @foreach ($zonasTodas as $zon)
            @php
              $esta = $zon->estaEn($zonas);
            @endphp
            <div class="">
            <input class="" type="checkbox" name="zona[]" value="{{$zon->ID}}"
            @if ($esta == true)
              checked
            @endif
              >
            <label for="zona">{{$zon->NOMBRE_ZONA}}</label>
            </div>
          @endforeach
        </div>

     </div>

      </div>


   </div>
   <div class="descri t90 padding1 blanco">

     <div class="">
       <div class="flex align_center">
         @if ($usuario->descripcion ==! null)
         <p class="px16 margin1">Acerca de mí:</p>
         @endif
         @if ($soloVista == false)
         <img id="modificar_descrip" class="icono hoverAmarillo manoHover" style="max-height:3vh;" src="/img_app/cambiar_icon.png" alt="">
         @endif
       </div>

       @if ($usuario->descripcion ==! null && $soloVista == true)
       <div class="t50 mostrar">
         <p>{{$usuario->descripcion}}</p>
       </div>
       @endif
     </div>

   @if ($soloVista == false)
     @if ($usuario->descripcion == null)
     <label class="italic px14" for="descripcion">Agregá una descripción personalizada:</label>
     @endif
     <textarea class="mostrar anchoTexMobile a100
     @if ($usuario->descripcion != null)
     oculto
     @endif
     "
     name="descripcion" rows="8" cols="80">
      @if ($usuario->descripcion != null)
        {{$usuario->descripcion}}
      @endif
     </textarea>
   @endif

  </div>
  @endif
    @if ($soloVista == false)
   <div class="buttons">
      <button class="center manoHover w100" style="background-color:rgba(247, 220, 111); height:5vh;" type="submit" name="button">GUARDAR CAMBIOS</button>
   </div>
    @endif

    </form>

    <div class="feed">
      @if ($mostrarTrabajos==true)
         <div class="t50 oculto" id="posteosUsuario">
      @else
         <div class="t50" id="posteosUsuario">
      @endif
      @if ($soloVista == false)
      <p class="txt_centrado t90">Últimas búsquedas relacionadas:</p>

      <div class="feedPosteosRelacionados">
        @foreach ($posteosP as $post)
            <div class="t90 margin1 ">
              <p>Rubro: {{$post->rubro->NOMBRE_RUBRO}} / Zona: {{$post->zona->NOMBRE_ZONA}}</p>
              <p>De: {{$post->usuario->USER_NAME}}</p>
              <p>
              {{$post->mensaje}}
              </p>
            </div>
          @endforeach
          <script type="text/javascript">
            var ultimoIdPost = {{$posteosP->first()->id}}
            var idUsuario = {{$usuario->ID}}
          </script>

          </div>
        {{$posteosP->links()}}
     @endif
      </div>
      @if ($mostrarTrabajos==true)
        <div class="t50" id="trabajosTerminados" >
     @else
       <div class="t50 oculto" id="trabajosTerminados" >
     @endif

        <p class="txt_centrado t90">Ultimos trabajos</p>
        @foreach ($trabajos as $tabajo)
          <div class="t90 margin1 ">
            <p>
            {{$tabajo->descripcion}}
            </p>

            @if ($tabajo->fotos != null)

              @foreach (json_decode($tabajo->fotos, true) as $foto)

                   <img class="foto-muro" src="/storage/{{$foto}}" alt="">

               @endforeach
            @endif
          </div>
        @endforeach
     {{$trabajos->appends(["trabajos" => "true"])->links()}}
      </div>

   </div>

</div>



  <div class="lateral_der flex column">
   <div class="w90 center marginTop1">
      <img class= "publicid" src="/img_publicidad/acindar_1.jpg" alt="">
      <img class= "publicid" src="/img_publicidad/acindar_2.jpg" alt="">
      <img class= "publicid" src="/img_publicidad/acindar.png" alt="">
    </div>
  </div>
</div>
@stop
