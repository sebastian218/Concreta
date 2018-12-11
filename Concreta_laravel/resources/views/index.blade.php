@extends('plantilla')


@section('contenido')


    <div class="container_home">

        <div class="h1-label">

                <h1 class="h1-home"> Buscá servicios <br> para tu hogar o empresa</h1>
            <form class="buscadorHome" action="/index" method="post">
              {{ csrf_field() }}
              <label class="label-home"  for="buscador">
                <input placeholder="Ej : Plomeros Zona Oeste" id="buscador" type="text" name="buscador" value="">
                <input type="hidden" name="enviar" value="">
              </label>
            </form>
       </div>

   <section class="cuerpo">

              <p class="subtit"> Busca entre mas de 1000 trabajadores registrados y conseguí <strong>el mejor presupuesto </strong></p>
      <h2 class="tit-perf" >Perfiles</h2>

         <div class="perfiles" >

          <article class="art-perfiles">
               <div class="foto-nombre">
                      <img class="cara-perf" src="../img/plomero2.jpg" alt="">
                      <p class="nombre-perf">Nombre</p>
                      <img src="../img/cinco_estrellitas.png" alt="">
               </div>
               <div class="datos-rubro-boton">
                     <h2 class="rubro-perf">Rubro</h2>
                     <p class="perf-zona">Zona</p>
                     <p class="perf-descript">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                     <a href="#">Ver mas</a>
               </div>
             </article>
             <article class="art-perfiles">
                  <div class="foto-nombre">
                         <img class="cara-perf" src="../img/plomero2.jpg" alt="">
                         <p class="nombre-perf">Nombre</p>
                         <img src="../img/cinco_estrellitas.png" alt="">
                  </div>
                  <div class="datos-rubro-boton">
                        <h2 class="rubro-perf">Rubro</h2>
                        <p class="perf-zona">Zona</p>
                        <p class="perf-descript">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#">Ver mas</a>
                  </div>
                </article>
                <article class="art-perfiles">
                     <div class="foto-nombre">
                            <img class="cara-perf" src="../img/plomero2.jpg" alt="">
                            <p class="nombre-perf">Nombre</p>
                            <img src="../img/cinco_estrellitas.png" alt="">
                     </div>
                     <div class="datos-rubro-boton">
                           <h2 class="rubro-perf">Rubro</h2>
                           <p class="perf-zona">Zona</p>
                           <p class="perf-descript">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                           <a href="#">Ver mas</a>
                     </div>
                   </article>
                   <article class="art-perfiles">
                        <div class="foto-nombre">
                               <img class="cara-perf" src="../img/plomero2.jpg" alt="">
                               <p class="nombre-perf">Nombre</p>
                               <img src="../img/cinco_estrellitas.png" alt="">
                        </div>
                        <div class="datos-rubro-boton">
                              <h2 class="rubro-perf">Rubro</h2>
                              <p class="perf-zona">Zona</p>
                              <p class="perf-descript">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                              <a href="#">Ver mas</a>
                        </div>
                      </article>

                    </article>
                    <article class="art-perfiles crear-perfil">
                         <div class="foto-nombre">
                                <img class="cara-perf" src="/img_app/icono_constructor.png" alt="">
                                <p class="nombre-perf">Creá Tu Perfil !</p>
                                <img src="/img_app/cinco_estrellitas.png" alt="">
                         </div>
                         <div class="datos-rubro-boton">
                               <h2 class="rubro-perf">¿Prestás Servicios?</h2>
                               <p class="perf-descript">CREANDO TU PERFIL EN CONCRETA PODÉS RECIBIR OFERTAS DE CLIENTES POTENCIALES, COTIZAR PRESUPUESTOS Y MUCHO MAS</p>
                               <a href="/register">Ver mas</a>
                         </div>
                       </article>


        </div>

        <div class="publi-home">

          <div class="a-publi">
            <a href="#"> <img class="banner-decker" src="/img_publicidad/banner_black_decker.jpg" alt=""> </a>
          </div>


        </div>

      </section>




@endsection
