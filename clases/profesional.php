<?php
include_once("../clases/usuario.php");

/**
 *
 */
class Profesional extends Usuario
{
  protected $rubro=[];
  protected $zona=[];
  protected $dni;

  function __construct(array $datos, $dni, $rubro, $zona)
  {
    $this->rubro=$rubro;
    $this->zona=$zona;
    $this->dni=$dni;
    parent::__construct($id,$userName,$nombre,$apellido,$email,$password);
  }
  public function getRubro(){
    return $this->rubro;
  }
  public function setRubro($rubro){
    $this->rubro= $rubro;
  }
  public function getZona(){
    return $this->zona;
  }
  public function setZona($zona){
    $this->zona = $zona;
  }
  public function getDni(){
    return $this->dni ;
  }
  public function setDni($dni){
    $this->dni = $dni;
  }
  public function AgregarZona($zona){
    $this->zona[]=$zona;
  }
  public function AgregarRubro($rubro){
    $this->rubro[]=$rubro;
  }
}


 ?>
