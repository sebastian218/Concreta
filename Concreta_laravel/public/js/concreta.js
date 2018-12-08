window.addEventListener("load",function(){


    var sectionTipoPerfil = document.querySelector(".elegir_perfil");
    var botonProfesional = document.querySelector('.elegir_perfil_profesional');
    var botonCliente = document.querySelector('.elegir_perfil_cliente');
    var onHoverShow = document.querySelector('.onHoverShow');
    var mostrarRubro = document.querySelector('.mostrarRubro');


    botonProfesional.addEventListener("click", function(){

       document.getElementById('esTrabajador').setAttribute('value', 1);
       document.querySelector('.formulario').style.display = "block";
       sectionTipoPerfil.style.display = "none";


     });
botonCliente.addEventListener("click", function(){

   document.getElementById('esTrabajador').setAttribute('value', 0);
   document.querySelector('.formulario').style.display = "block";
   sectionTipoPerfil.style.display = "none";


    });

mostrarRubro.addEventListener("click", function(){

    document.querySelector('.form_rubro').style.display = "block";
});



});
