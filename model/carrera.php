<?php

require_once 'conexion.php';

class Carrera extends Conexion{

  private $acceso;

  public function __CONSTRUCT(){
    $this->acceso = parent::getConexion();
  }

  public function listarCarreras(){
    try{
      $consulta = $this->acceso->prepare("CALL spu_carreras_listar()");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}


?>