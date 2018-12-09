window.addEventListener("load",function(){


    var sectionTipoPerfil = document.querySelector(".elegir_perfil");
    var botonProfesional = document.querySelector('.elegir_perfil_profesional');
    var botonCliente = document.querySelector('.elegir_perfil_cliente');
    var onHoverShow = document.querySelector('.onHoverShow');
    var mostrarRubroP = document.getElementById('mostrarRubroP');
    var mostrarRubroS = document.getElementById('mostrarRubroS');
    var agregarRubroS = document.getElementById('agregarRubroS');

    if (agregarRubroS) {
      agregarRubroS.addEventListener("click", function(){
          document.getElementById('form_rubro_S').classList.remove('oculto');
      });
    };

    if (mostrarRubroS){
    mostrarRubroS.addEventListener("click", function(){
        document.getElementById('form_rubro_S').setAttribute('class', "margin1");
    });
    };

    if (mostrarRubroP) {
      mostrarRubroP.addEventListener("click", function(){
          document.getElementById('form_rubro_P').classList.remove('oculto');
      });
    };

    if (botonProfesional) {
      botonProfesional.addEventListener("click", function(){

         document.getElementById('esTrabajador').setAttribute('value', 1);
         document.querySelector('.formulario').style.display = "block";
         sectionTipoPerfil.style.display = "none";
       });
    };

    if (botonCliente) {
      botonCliente.addEventListener("click", function(){

     document.getElementById('esTrabajador').setAttribute('value', 0);
     document.querySelector('.formulario').style.display = "block";
     sectionTipoPerfil.style.display = "none";


      });
    };



});
