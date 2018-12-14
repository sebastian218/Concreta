@extends('plantilla')


@section('contenido')

  <div class="banner_rubro">
    <img class = "a100" src="/img_app/textura_rubro_0.jpg" alt="">
  </div>

<div class="container">

  <div class="lateral_izq ">
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
    <form class="formPosteoMuro t90" action="/muro" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}


          <label class="labelMuro" for="zona">Zona</label>
          <select class="" name="zona">
            <option value="null" selected disabled>Selecciona una zona</option>
            @foreach ($zonas as $zona)
              <option value="{{$zona->ID}}">{{$zona->NOMBRE_ZONA}}</option>
            @endforeach
          </select>



    <label class="labelMuro" for="rubro">Rubro</label>
    <select class="" name="rubro">
      <option value="null" selected disabled>Selecciona un rubro</option>
      @foreach ($rubros as $rubro)
        <option value="{{$rubro->ID}}">{{$rubro->NOMBRE_RUBRO}}</option>
      @endforeach
    </select>




    <label class="labelMuro" for="foto">Carga una Foto</label>
    <input type="file" name="fotos[]" value="">
    <input type="file" name="fotos[]" value="">
    <input type="file" name="fotos[]" value="">
    <input type="file" name="fotos[]" value="">
    <label class="labelMuro"  for="text">Describe tu necesidad :</label>
    <textarea name="text" rows="8" cols="80" placeholder="Escriba aqui"></textarea>
    <input type="hidden" name="idUsuario" value="{{-- Acá va el id de Usuario auth()->ID --}}">

    <div class="botonesMuroPosteo">
      <button class="boton enviar" type="submit" name="buttonSubmit" style="cursor:pointer">Enviar</button>
      <button class="boton" type="reset" name="buttonReset" style="cursor:pointer">Cancelar</button>
    </div>
 </form>

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
