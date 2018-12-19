{{--}}empieza botones{{--}}
<div class="margin1 flex w90 botonesPerfBuscador" style="justify-content:space-between;">
  <p class="padding1 margin0 pointer
  @if (Auth::guest())
    gris_oscuro no_contactar"
  @else
    fondoAmarillo contactar"
  @endif
  id = "c_{{$post->usuario_id}}"
  >CONTACTAR</p>
  <a href="/perfil/ver/{{$post->usuario_id}}" class="fondoNaranja padding1" >VER PERFIL</a>
</div>


<div class="contacto margin2 padding2 t90 oculto fondoAmarillo" id="ver_c_{{$post->usuario_id}}">
<form class="" action="/guardarMensaje" method="post">
       {{ csrf_field() }}
<input class="oculto" type="text" name="id_receptor" value="{{$post->usuario_id}}">
<input class="oculto" type="text" name="id_emisor" value="{{Auth::ID()}}">
<p class="margin1">Enviar Mensaje a {{$post->usuario->USER_NAME}}</p>
<textarea name="mensaje" rows="8" class="w100"></textarea>
<div class="flex spaceBetween" >
<button type="reset" class="sinBorde" name="button">BORRAR</button>
<button class="fondoNaranja" class="sinBorde" type="submit" name="">ENVIAR</button>
</div>

</form>
</div>
{{--}}terminabotones{{--}}
