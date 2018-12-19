@extends('plantilla')


@section('contenido')

  <div class="banner_rubro">
    <img class = "a100" src="/img_app/textura_rubro_0.jpg" alt="">
  </div>

<div class="container">

  <div class="lateral_izq">
    <div class="w90 center t50 flex column">
       <div class="blanco flex h10">
         <div class="flex" style="width: 25%;">
         <img class="padding1 center" style="width:60%" src="/img_app/logo_mensaje.png" alt="">
         </div>
         <div class="bordeLateral flex">
         <p class="txt_centrado px14 center padding1 bold">Últimos Mensajes</p>
         </div>
       </div>
 </div>
  </div>

  <div class="cuerpo_central">
    <div class="t90 flex padding1 formPosteosMuro">
    <form class="" action="/muro" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="zonaRubroMuro">
        <div class="selectLabelZona">
          <label class="labelMuro" for="zona">Zona</label>
          @if ($errors->has("zona"))
            <p class="p-error" >{{$errors->first("zona")}}</p>
          @endif
          <select class="" name="zona">
            <option value="null" selected disabled>Selecciona una zona</option>
            @foreach ($zonas as $zona)
              @if ($zona->ID === old("zona"))
                <option value="{{$zona->ID}}" selected>{{$zona->NOMBRE_ZONA}}</option>
              @else
                <option value="{{$zona->ID}}">{{$zona->NOMBRE_ZONA}}</option>
              @endif
            @endforeach
          </select>
        </div>



     <div class="selectLabelRubro">
       <label class="labelMuro" for="rubro">Rubro</label>
       @if ($errors->has("rubro"))
         <p class="p-error" >{{$errors->first("rubro")}}</p>
        @else
       <select class="" name="rubro">
         <option value="null" selected disabled>Selecciona un rubro</option>
         @foreach ($rubros as $rubro)
           @if ($rubro->ID === old("rubro"))
           <option value="{{$rubro->ID}}" selected>{{$rubro->NOMBRE_RUBRO}}</option>
           @else
           <option value="{{$rubro->ID}}">{{$rubro->NOMBRE_RUBRO}}</option>
           @endif
         @endforeach
       </select>
     @endif
     </div>
  </div>



 <div class="labelFotoP">
   <label class="labelMuro" for="foto">Carga una imagen</label>
   <p class="italic px12">Agregá hasta cuatro fotos o planos</p>
 </div>





    <div class="mostrar_">
      @for ($i=0; $i < 4; $i++)
        <p class="signosMas" style="cursor:pointer" id="mostrar_{{$i}}">+</p>
        <input class="oculto seleccionar" type="file" name="fotos[]" value="" id="foto_mostrar_{{$i}}">
      @endfor
    </div>

    <label class="labelMuro" for="text">Agregá una descripción de lo que buscás:</label>
    @if ($errors->has("text"))
      <p class="p-error" >{{$errors->first("text")}}</p>
    @endif
    <textarea class="texAreaMuro" name="text" rows="8" cols="80" placeholder="Escriba aqui"></textarea>
    <input type="hidden" name="idUsuario" value={{Auth::ID()}} >

    <div class="botonesMuroPosteo">
      <button class="boton" type="reset" name="buttonReset" style="cursor:pointer">Cancelar</button>
      <button class="boton enviar" type="submit" name="buttonSubmit" style="cursor:pointer">Enviar</button>
    </div>
 </form>
 </div>

 <div class="t50">
   <p class="txt_centrado t90">Últimas Posteos :</p>
   @foreach ($posteos as $post)
     <div class="t90 margin1">
       <p>Rubro: {{$post->rubro->NOMBRE_RUBRO}} / Zona: {{$post->zona->NOMBRE_ZONA}}</p>
       <p>De: {{$post->usuario->USER_NAME}}</p>
       <p>
       {{$post->mensaje}}
       </p>

       @if ($post->foto != null)

         @foreach (json_decode($post->foto, true) as $foto)

              <img class="foto-muro" src="storage/{{$foto}}" alt="">

          @endforeach
       @endif


     </div>
   @endforeach
{{$posteos->links()}}
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

@endsection
