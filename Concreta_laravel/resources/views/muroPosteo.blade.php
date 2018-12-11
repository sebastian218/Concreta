@extends('plantilla')


@section('contenido')


<form class="" action="/muro" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
<label for="zona">Zona</label>
<select class="" name="zona">
  @foreach ($zonas as $zona)
    <option value="{{$zona->ID}}">{{$zona->NOMBRE_ZONA}}</option>
  @endforeach
</select>

<label for="rubro">Rubro</label>
<select class="" name="rubro">
  @foreach ($rubros as $rubro)
    <option value="{{$rubro->ID}}">{{$rubro->NOMBRE_RUBRO}}</option>
  @endforeach
</select>
<label for="foto">Carga una Foto</label>
<input type="file" name="foto" value="">
<label for="text">Describe tu necesidad</label>
<textarea name="text" rows="8" cols="80" placeholder="Escriba aqui"></textarea>
<input type="hidden" name="idUsuario" value="">
<button type="submit" name="buttonSubmit" style="cursor:pointer">Enviar</button>

<button type="reset" name="buttonReset" style="cursor:pointer">Cancelar</button>
</form>
@endsection
