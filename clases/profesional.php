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

  function __construct(Array $datos)
  {
    $this->rubro[]=$datos["RUBRO"];
    $this->zona[]=$datos["zona"];
    $this->dni=$datos["DNI"];

    parent::__construct( $datos);

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
