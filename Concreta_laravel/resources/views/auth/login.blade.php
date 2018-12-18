@extends('plantilla')


@section("contenido")

  <body class="container_login">
  <div>
    <div class="banner_perfiles">
   </div>
    <section >
      <div class="Registro">
        <form class="login" action="{{ route('login') }}" method="POST">
          {{ csrf_field() }}
          <label for="email"> Email</label>
          @if ($errors->has("email"))
            <input  class="input-form error" placeholder="" type="email" name="email" id="email" value="">
            <p class="p-error" >{{$errors->first("email")}}</p>
          @else
              <input  class="input-form" placeholder="" type="text" name="email" id="email" value="{{old("email")}}">
          @endif
          <label for="password"> Password</label>
          @if ($errors->has("password"))
            <input  class="input-form error" placeholder="" type="password" name="password" id="password" value="">
            <p class="p-error" >{{$errors->first("password")}}</p>
          @else
              <input  class="input-form" placeholder="" type="password" name="password" id="password" value="">
          @endif
          <br>
          <div class="form-group">
            <input type="checkbox" name="remember" class="control" value=""> Recordame
          </div>
          <div class="enviar_cancelar">
          <button class="boton" type="submit" name="button">Iniciar Sesión</button>
          <br>
          <button class="boton" type="reset" name="button">Cancelar</button>
          </div>
        </form>


      </div>
    </section>


@endsection
