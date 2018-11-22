<?php
include_once("model.php");

 class Usuario extends Model {

    protected $id;
    protected $userName;
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $password;


    public function __construct(Array $datos) {

      $this->userName = $datos["usuario"];
      $this->nombre = $datos["nombre"];
      $this->apellido = $datos["apellido"];
      $this->email = $datos["email"];

      if (isset($datos["ID"] )) {

           $this->id = $datos["ID"];
           $this->password = $datos["password"];

       } else {
           $this->password =  password_hash($datos["password"],PASSWORD_DEFAULT);

           $this->id = NULL;
//           var_dump($this);exit;
       }


}






    public function getUserName(){
      return $this->userName;
    }
    public function setUserName($userName){
      $this->userName =$userName;
    }
    public function getNombre(){
      return $this->nombre;
    }
    public function setNombre($nombre){
      $this->nombre = $nombre;
    }
    public function getApellido(){
      return $this->apellido;
    }
    public function setApellido($apellido){
      $this->apellido = $apellido;
    }
    public function getEmail(){
      return $this->email ;
    }
    public function setEmail($email){
      $this->email = $email;
    }
    public function getPassword(){
      return $this->password ;
    }
    public function set($password){
      $this->password = $password;
    }
    public function getId(){

         return $this->id;

    }
    public function setId($id){

        $this->id = $id;

    }

}


 ?>
