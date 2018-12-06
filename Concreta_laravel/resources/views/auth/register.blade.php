@extends('plantilla')


@section('contenido')
  <div class="container_formularios_gral">

    <div class="banner_perfiles">

    <p class="crea_perfil">Completá tu perfil y registrate en Concreta</p>
    </div>

    <section>
      <div class="reg-container">
      <div class="Registro_cliente">

        <form class="registracion_cliente borde_redondeado" action="/register" method="POST" enctype="multipart/form-data" >
        @csrf
        <label for="usuario"> Usuario</label>
        @if ($errors->has("usuario"))
          <input  class="input-form error" placeholder="" type="text" name="usuario" id="usuario" value="">
          <p class="p-error" >{{$errors->first("usuario")}}</p>
         @else
            <input  class="input-form" placeholder="" type="text" name="usuario" id="usuario" value="{{old("usuario")}}">
        @endif

        <label for="nombre"> Nombre</label>
        @if ($errors->has("nombre"))
          <input  class="input-form error" placeholder="" type="text" name="nombre" id="nombre" value="">
          <p class="p-error" >{{$errors->first("nombre")}}></p>
        @else
            <input  class="input-form" placeholder="" type="text" name="nombre" id="nombre" value="{{old("nombre")}}">
        @endif

        <label for="apellido"> Apellido </label>
        @if ($errors->has("apellido"))
          <input  class="input-form error" placeholder="" type="text" name="apellido" id="apellido" value="">
          <p class="p-error" >{{$errors->first("apellido")}}</p>
        @else
            <input  class="input-form" placeholder="" type="text" name="apellido" id="apellido" value="{{old("apellido")}}">
        @endif
        <label for="email"> Email </label>
         @if ($errors->has("email"))
          <input  class="input-form error" placeholder="" type="text" name="email" id="email" value="">
          <p class="p-error" >{{$errors->first("email")}}</p>
        @else
            <input  class="input-form" placeholder="" type="text" name="email" id="email" value="{{old("email")}}">
        @endif


        <label for="password"> Contraseña </label>
        @if ($errors->has("password"))
          <input  class="input-form error" placeholder="" type="password" name="password" id="password" value="">
          <p class="p-error" >{{$errors->first("password")}}</p>
        @else
            <input  class="input-form" placeholder="" type="password" name="password" id="password" value="">
        @endif

        <label for="password-confirm"> Confirmar contraseña </label>
        <input  class="input-form" placeholder="" type="password" name="password_confirmation" id="password-confirm" value="" required>


       <div class="enviar_cancelar">
         <button class="boton envregister"  type="reset" name="button">Cancelar</button>
         <button class="boton enviar"  type="submit" name="button">Registrarme</button>
      </div>

    </form>
@endsection
