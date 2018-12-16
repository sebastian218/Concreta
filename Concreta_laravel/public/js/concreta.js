window.addEventListener("load",function(){


    var sectionTipoPerfil = document.querySelector(".registerIntermedio");
    var botonProfesional = document.querySelector('.elegir_perfil_profesional');
    var botonCliente = document.querySelector('.elegir_perfil_cliente');
    var onHoverShow = document.querySelector('.onHoverShow');
    var mostrarRubroP = document.getElementById('mostrarRubroP');
    var mostrarRubroS = document.getElementById('mostrarRubroS');
    var agregarRubroS = document.getElementById('agregarRubroS');
    var mostrarZonas = document.getElementById('mostrarZonas');
    var mostrarEsp = document.getElementById('mostrarEsp_1');
    var mostrarDescrip = document.getElementById('modificar_descrip');

    var mostrarSelecFotos = document.querySelector('.mostrar_');

   if (mostrarSelecFotos) {
      mostrarSelecFotos.addEventListener("click", function() {
      var x = event.target.id;
      console.log(x);
      var agarroId = 'foto_' + x;
      var mostrar = document.getElementById(agarroId);
      mostrar.classList.toggle('oculto');
        });
    };

    if (mostrarDescrip) {
      mostrarDescrip.addEventListener("click", function() {
      var els = document.querySelectorAll(".mostrar");
      for (var i=0; i < els.length; i++) {
        els[i].classList.toggle('oculto');
      }
      });
    };

    if (mostrarEsp) {
      mostrarEsp.addEventListener("click", function(){
          var els = document.querySelectorAll(".mostrar_esp");
          for (var i=0; i < els.length; i++){
            els[i].classList.toggle('oculto');
            //els[i].setAttribute('class', "margin0");
          }
      });
    };

    if (mostrarZonas) {
      mostrarZonas.addEventListener("click", function(){
          var els = document.querySelectorAll(".zona_ch");
          for (var i=0; i < els.length; i++){
            els[i].classList.toggle('oculto');
          }
      });
    };

    if (agregarRubroS) {
      agregarRubroS.addEventListener("click", function(){
          document.getElementById('form_rubro_S').classList.toggle('oculto');
      });
    };

    if (mostrarRubroS){
    mostrarRubroS.addEventListener("click", function(){
        document.getElementById('form_rubro_S').classList.toggle('oculto');
    });
    };

    if (mostrarRubroP) {
      mostrarRubroP.addEventListener("click", function(){
          document.getElementById('form_rubro_P').classList.toggle('oculto');
      });
    };

    if (botonProfesional) {
      botonProfesional.addEventListener("click", function(){

         document.getElementById('esTrabajador').setAttribute('value', 1);
         document.querySelector('.formUsuarios').classList.remove('oculto');
         sectionTipoPerfil.classList.add("oculto");
       });
    };

    if (botonCliente) {
      botonCliente.addEventListener("click", function(){

     document.getElementById('esTrabajador').setAttribute('value', 0);
     document.querySelector('.formUsuarios').classList.remove('oculto');
     sectionTipoPerfil.classList.add("oculto");


      });
    };

//Acá arranca script para iconos mobile lupa y Hambur

   var menuHamb = document.querySelector('.hamburIcon');

   var menuLupa = document.querySelector('.lupaIcon');

   if (menuHamb) {

            menuHamb.addEventListener("click", function(){

            document.querySelector('.hamburgDesp').classList.toggle('oculto');

        });

  };

     if (menuLupa) {

        menuLupa.addEventListener("click", function(){

        document.querySelector('.lupaDesp').classList.toggle('oculto');


});

};
//fin lupa y Hamburger



//Evento para Formulario posteo de trabajos

  var botonFomPostTrabjas = document.querySelector('.botonDesplegarFormTrabajos');

    if (botonFomPostTrabjas) {

      botonFomPostTrabjas.addEventListener("click", function(){

                      document.querySelector('.formPosteoTrabajos').classList.toggle('oculto');


      });

    };

//fin form posteoTrabajos

//Slider Perfiles Home
      var contenedorSlider = document.querySelector(".slider-perfiles");
      var perfilesHome = document.querySelectorAll('.artPerfilesIndex');
      var botonSiguiente = document.querySelector('.botonSiguiente');
      var botonAnterior = document.querySelector('.botonAnterior');

          var contadorSlider = 0;

     if (perfilesHome.length > 0) {

      perfilesHome[contadorSlider].style ="display:flex";

    }



      if (botonSiguiente) {

            botonSiguiente.addEventListener('click', function(){

                           contadorSlider += 1;
                           if (contadorSlider > perfilesHome.length - 1) {
                            contadorSlider = 0;
                           }
                      for (var i = 0; i < perfilesHome.length; i++) {

                        if (perfilesHome[i] != perfilesHome[contadorSlider]) {

                           perfilesHome[i].style = "display: none";
                           perfilesHome[contadorSlider].style = "display:flex";
                        }

                      }
                });


    };

      if (botonAnterior) {

        botonAnterior.addEventListener('click', function(){

                       contadorSlider -= 1;
                       if (contadorSlider < 0) {
                           contadorSlider = perfilesHome.length - 1;
                       }
                  for (var i = 0; i < perfilesHome.length; i++) {

                    if (perfilesHome[i] != perfilesHome[contadorSlider]) {

                       perfilesHome[i].style = "display: none";
                       perfilesHome[contadorSlider].style = "display:flex";
                    }
                  }
            });

      };


//fin slide home



});
