<?php
include_once("db.php");
include_once("usuario.php");
include_once("profesional.php");

class mysqlDb extends Db {
  protected $dbUsuarios;

public function __construct(){

  $credenciales=file_get_contents("credenciales.json");
  $credenciales=json_decode($credenciales,true);
  $dsn= $credenciales["dsn"];
  $user= $credenciales["usuario"];
  $pass= $credenciales["password"];

  try {
    $this->dbUsuarios= new PDO($dsn,$user,$pass);
    $this->dbUsuarios->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (\Exception $e) {

      echo "Hubo un error";exit;
  }

}

public function crearUsuario(Usuario $usuario) {

  $consulta = $this->dbUsuarios->prepare("INSERT into USUARIOS (ID,USER_NAME,EMAIL,NOMBRE,APELLIDO,DNI,PASS) values (default, :user_name, :email , :nombre, :apellido,  :dni, :pass)");
  $consulta->bindValue(":user_name", $usuario->getUserName());
  $consulta->bindValue(":email", $usuario->getEmail());
  $consulta->bindValue(":nombre", $usuario->getNombre());
  $consulta->bindValue(":apellido", $usuario->getApellido());
  $consulta->bindValue(":dni", $usuario->getDni());
  $consulta->bindValue(":pass", $usuario->getPassword());
  $consulta->bindValue(":email", $usuario->getEmail());

  $consulta->execute();

 }


public function crearUsuarioProfesional(Profesional $usuario) {

  $consulta = $this->dbUsuarios->prepare("INSERT into USUARIOS (ID,USER_NAME,EMAIL,NOMBRE,APELLIDO,DNI,PASS) values (default, :user_name, :email , :nombre, :apellido,  :dni, :pass)");
  $consulta->bindValue(":user_name", $usuario->getUserName());
  $consulta->bindValue(":email", $usuario->getEmail());
  $consulta->bindValue(":nombre", $usuario->getNombre());
  $consulta->bindValue(":apellido", $usuario->getApellido());
  $consulta->bindValue(":dni", $usuario->getDni());
  $consulta->bindValue(":pass", $usuario->getPassword());
  $consulta->bindValue(":email", $usuario->getEmail());

  $consultaRubro = $db -> prepare("INSERT into USUARIO_RUBRO values(default,:USUARIO_ID,:RUBRO_ID) ");
  $consultaRubro->bindValue(":USUARIO_ID",$id);
  $consultaRubro->bindValue(":RUBRO_ID", intval($usuario->getRubro()));

  $consultaRubro->execute();

  $consultaZona = $db -> prepare("INSERT into USUARIO_ZONA values(default,:USUARIO_ID,:ZONA_ID) ");
  $consultaZona->bindValue(":USUARIO_ID",$id);
  $consultaZona->bindValue(":ZONA_ID", intval($usuario>getZona()));

  $consultaZona->execute();
}

public function traerUsuarios(){
  $consulta = $this->dbUsuarios->prepare("SELECT * FROM USUARIOS");

  $consulta->execute();

  $usuariosArray = $consulta->fetchAll(PDO::FETCH_ASSOC);
  $usuarios = [];

  foreach ($usuariosArray as $usuarioArray) {
    $usuarios[] = new Usuario($usuarioArray);
  }

  return $usuarios;
}

public function buscarPorEmail($email) {
  $consulta = $this->dbUsuarios->prepare("SELECT * FROM USUARIOS where EMAIL = :email");

  $consulta->bindValue(":email", $email);

  $consulta->execute();

  $usuarioArray = $consulta->fetch(PDO::FETCH_ASSOC);

  if ($usuarioArray == null) {
    return null;
  }

  return new Usuario($usuarioArray);
}

public function buscarPorID($id) {
  $consulta = $this->dbUsuarios->prepare("SELECT * FROM usuarios where id = :id");

  $consulta->bindValue(":id", $id);

  $consulta->execute();

  $usuarioArray = $consulta->fetch(PDO::FETCH_ASSOC);

  if ($usuarioArray == NULL) {
    return NULL;
  }

  return new Usuario($usuarioArray);
}




}


 ?>
