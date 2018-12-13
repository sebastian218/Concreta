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

    //Acá arranca script para iconos mobile

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

}


});
