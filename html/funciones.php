<?php

$credenciales=file_get_contents("credenciales.json");
$credenciales=json_decode($credenciales,true);
$dsn= $credenciales["dsn"];
$user= $credenciales["usuario"];
$pass= $credenciales["password"];

try {
  $db = new PDO($dsn,$user,$pass);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Exception $e) {

    echo "Hubo un error";exit;
}

function validarUsuario($datos) {
  $datosFinales = [];
  $errores = [];
  foreach ($datos as $key => $dato ) {
    if (is_string($dato)) {
      $datosFinales[$key] = trim($dato);
    } else {
      $datosFinales[$key] = $dato;
    }

  }

  if (strlen($datosFinales["usuario"]) == 0) {
    $errores["usuario"] = "Por favor completá tu nombre de usuario";
  }else if(buscarPorUsuario($datosFinales["usuario"]) != NULL) {
    $errores["usuario"] = "El nombre de Usuario ya está en uso";
  }
  if (strlen($datosFinales["nombre"]) == 0){
    $errores["nombre"] = "Por favor completá tu nombre";
  } else if (ctype_alpha($datosFinales["nombre"]) == false) {
         $errores["nombre"] = "Hubo error en el nombre porque tiene caracteres no alfabéticos";
  }
  if (strlen($datosFinales["apellido"]) == 0){
    $errores["apellido"] = "Por favor completá tu apellido";
  }else if (ctype_alpha($datosFinales["apellido"]) == false) {
         $errores["apellido"] = "Hubo error en el apellido porque tiene caracteres no alfabéticos";
  }
  if (strlen($datosFinales["email"]) == 0 ){
   $errores["email"] = "Por favor ingresá un email";
 }else if (filter_var($datosFinales["email"], FILTER_VALIDATE_EMAIL) == false) {
   $errores["email"] = "El email ingresado no es válido";
 } else if (buscarPorEmail($datosFinales["email"]) != NULL) {
      $errores["email"] = "El email ya esta en uso";
   }
 if (strlen($datosFinales["password"]) == 0) {
   $errores["password"] = "Por favor completá el campo contraseña";
 } else if (strlen($datosFinales["password"]) < 8)  {
   $errores["password"] = "La contraseña debe tener al menos 8 caracteres";
 }
 if (strlen($datosFinales["password-confirm"]) == 0) {
   $errores["password-confirm"] = "Por favor confirmá la contraseña";
 }else if ($datosFinales["password"] != $datosFinales["password-confirm"] ) {
   $errores["password-confirm"] = "Falló la confirmación de contraseña";
}

if ( isset($_POST["button-profesional"])) {

  if (!isset($_POST["zona"])) {
    $errores["zona"] = "Seleccioná una zona";
  }
  if (!isset($datosFinales["RUBRO"])) {
     $errores["RUBRO"] = "Seleccioná tu rubro";
  }
  if (strlen($datosFinales["DNI"]) == 0) {
    $errores["DNI"] = "Por favor completá nro de DNI";
  }
  if ($_FILES["avatar"]["error"] != 0) {
    $errores["avatar"] = "Hubo un error en la carga";
  } else {
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    if ($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
      $errores["avatar"] = "Solo puedes subir fotos jpg, png o jpeg";
    }
  }
}

  return $errores;
}
/*function proximoId(){

   $json = file_get_contents("usuarios.json");

   if ($json == "") {

     return 1;
   } else {


   $usuarios= json_decode($json, true);

   $ultimo = array_pop($usuarios);

     return $ultimo["id"] + 1;
   }
}*/

 function armarUsuario() {

    $usuario = [
         "usuario" => trim($_POST["usuario"]),
         "nombre"  => trim($_POST["nombre"]),
         "apellido"=>trim($_POST["apellido"]),
         "email" =>trim($_POST["email"]),
         "password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
            ];

    if (isset($_POST["button-profesional"])) {

      $usuario["zona"]= $_POST["zona"];
      $usuario["RUBRO"]= $_POST["RUBRO"];
      $usuario["DNI"]= trim($_POST["DNI"]);

    } else {

      $usuario["DNI"] = null;

    }

      return $usuario;

 }


 function crearUsuario($usuario) {

   global $db;
   $consulta = $db->prepare("INSERT into USUARIOS (ID,USER_NAME,EMAIL,NOMBRE,APELLIDO,DNI,PASS) values (default, :user_name, :email , :nombre, :apellido,  :dni, :pass)");
   $consulta->bindValue(":user_name", $usuario["usuario"]);
   $consulta->bindValue(":email", $usuario["email"]);
   $consulta->bindValue(":nombre", $usuario["nombre"]);
   $consulta->bindValue(":apellido", $usuario["apellido"]);
   $consulta->bindValue(":dni", $usuario["DNI"]);
   $consulta->bindValue(":pass", $usuario["password"]);
   $consulta->bindValue(":email", $usuario["email"]);

   $consulta->execute();

   $id = $db->lastInsertId();
   if (isset($usuario["RUBRO"])){


     $consultaRubro = $db -> prepare("INSERT into USUARIO_RUBRO values(default,:USUARIO_ID,:RUBRO_ID) ");
     $consultaRubro->bindValue(":USUARIO_ID",$id);
     $consultaRubro->bindValue(":RUBRO_ID", intval($usuario["RUBRO"]));

     $consultaRubro->execute();

  }

  if (isset($usuario["zona"])){

    $consultaRubro = $db -> prepare("INSERT into USUARIO_ZONA values(default,:USUARIO_ID,:ZONA_ID) ");
    $consultaRubro->bindValue(":USUARIO_ID",$id);
    foreach ($usuario["zona"] as $zona) {
      $consultaRubro->bindValue(":ZONA_ID", $zona);
      $consultaRubro->execute();
    }
 }

}

function traerUsuarios(){

     global $db;
     $consulta= $db->prepare("SELECT * FROM USUARIOS");
     $consulta->execute();
     $usuarios=$consulta->fetchAll(PDO::FETCH_ASSOC);

}


function buscarPorEmail($email) {

  global $db;
  $consulta = $db->prepare("SELECT * FROM usuarios WHERE email = :email");

  $consulta->bindValue(":email", $email);

  $consulta->execute();

  return $consulta->fetch(PDO::FETCH_ASSOC);
}
function buscarPorId($id) {

  global $db;
  $consulta = $db->prepare("SELECT * FROM usuarios WHERE id = :id");

  $consulta->bindValue(":id", $id);

  $consulta->execute();

  return $consulta->fetch(PDO::FETCH_ASSOC);

}
function buscarPorUsuario($usuario) {

  global $db;
  $consulta = $db->prepare("SELECT * FROM usuarios WHERE USER_NAME = :user");

  $consulta->bindValue(":user", $usuario);

  $consulta->execute();

  return $consulta->fetch(PDO::FETCH_ASSOC);

}
function loguear($email)  {
  $_SESSION["usuarioLogueado"] = $email;
//  $_SESSION["nombre"] = //llamar Nombre
}

function estaLogueado() {
  if (isset($_SESSION["usuarioLogueado"])) {
    return true;
  }
  else {
    return false;
  }
}
  function traerUsuarioLogueado() {
    $usuario = buscarPorEmail($_SESSION["usuarioLogueado"]);
    return $usuario;
  }

  function validarLogin($datos) {
    $errores = [];

    if ($datos["email"] == "") {
      $errores["email"] = "Dejaste el email vacío";
    }
    else if (filter_var($datos["email"], FILTER_VALIDATE_EMAIL) == false) {
      $errores["email"] = "El email ingresado no es un email";
    }
    else {
      $usuario = buscarPorEmail($datos["email"]);
      if ($usuario == null) {
        $errores["email"] = "El email no existe";
      }
    }

    if ($datos["password"] == "") {
      $errores["password"] = "Dejaste la pass vacía";
    }
    else {
      if ($usuario != null) {
        if (password_verify($datos["password"], $usuario["PASS"]) == false) {
          $errores["password"] = "Contraseña incorrecta";
        }
      }
    }

    return $errores;
  }

  function  convertirDatosRubro($usuario) {
    if ($usuario["RUBRO"] == "alba"){
      $rubro_completo = "Albañilería";
    }
    if ($usuario["RUBRO"] == "gas"){
      $rubro_completo = "Gas";
    }
    if ($usuario["RUBRO"] == "elect"){
      $rubro_completo = "Electricidad";
    }
    if ($usuario["RUBRO"] == "pisorevest"){
      $rubro_completo = "Colocación de Pisos y Revestimientos";
    }
    if ($usuario["RUBRO"] == "estruct"){
      $rubro_completo = "Estructuras";
    }
    if ($usuario["RUBRO"] == "transpor"){
      $rubro_completo = "Transporte, Carga y Descarga";
    }
    return $rubro_completo;
  }

  function convertirDatosZona($usuario) {
    if ($usuario["zona"] == "ZN"){
      $zona_completa = "Zona Norte";
    }
    if ($usuario["zona"] == "ZS"){
      $zona_completa = "Zona Sur";
    }
    if ($usuario["zona"] == "ZO"){
      $zona_completa = "Zona Oeste";
    }
    if ($usuario["zona"] == "ZC"){
      $zona_completa = "Zona Centro";
    }
    return $zona_completa;
  }

  function menuesRubro($usuario) {
   $especialidades = [];
    if ($usuario["RUBRO"] == "alba"){
      $esp1 = "Yesería";
      $esp2 = "Durlock";
      $esp3 = "Revoques";
      $esp4 = "Muros";
    }
    if ($usuario["RUBRO"] == "gas"){
      $esp1 = "Calefones y Termotanques";
      $esp2 = "Calderas";
      $esp3 = "Instalaciones";
      $esp4 = "Habilitaciones";
    }
    if ($usuario["RUBRO"] == "elect"){
      $esp1 = "Piso y losa radiante";
      $esp2 = "Aire acondicionado";
      $esp3 = "Tableros y disyuntores";
      $esp4 = "Habilitaciones";
    }
    if ($usuario["RUBRO"] == "pisorevest"){
      $esp1 = "Parquet";
      $esp2 = "Cerámicos";
      $esp3 = "Tarquini, revoques cementicios";
      $esp4 = "Hidrolaqueado";
    }
    if ($usuario["RUBRO"] == "estruct"){
      $esp1 = "Estructuras de aluminio";
      $esp2 = "Cimientos";
      $esp3 = "Estructuras de hierro";
      $esp4 = "Estructuras de hormigón";
    }
    if ($usuario["RUBRO"] == "transpor"){
      $esp1 = "Volquetes";
      $esp2 = "Corralón";
      $esp3 = "Lorem";
      $esp4 = "Ipsum";
    }
    $especialidades ["esp1"] = $esp1;
    $especialidades ["esp2"] = $esp2;
    $especialidades ["esp3"] = $esp3;
    $especialidades ["esp4"] = $esp4;
    return $especialidades;
  }

  function llamarArray($usuario) {
    $nro_array == $usuario["id"] - 1;
    return $nro_array;
  }

  function agregarEspecialidades($nro_array, $especialidades) {

    $usuarios = file_get_contents("usuarios.json");
    $usuarios = json_decode($usuarios, true);

    $usuarios[$nro_array]["Especialidades"] = $especialidades;
    $usuarios = json_encode($usuarios);
    file_put_contents("usuarios.json", $usuarios);
 }


?>
