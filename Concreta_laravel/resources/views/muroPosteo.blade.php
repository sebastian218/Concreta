@extends('plantilla')


@section('contenido')


<div class="containerMuro">
  <form class="formPosteoMuro" action="/muro" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
  <label class="labelMuro" for="zona">Zona</label>
  <select class="" name="zona">
    @foreach ($zonas as $zona)
      <option value="{{$zona->ID}}">{{$zona->NOMBRE_ZONA}}</option>
    @endforeach
  </select>

  <label class="labelMuro" for="rubro">Rubro</label>
  <select class="" name="rubro">
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
  <input type="hidden" name="idUsuario" value="">

  <div class="botonesMuroPosteo">
    <button class="boton enviar" type="submit" name="buttonSubmit" style="cursor:pointer">Enviar</button>
    <button class="boton" type="reset" name="buttonReset" style="cursor:pointer">Cancelar</button>
  </div>

  </form>
</div>

@endsection
