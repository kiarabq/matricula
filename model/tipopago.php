<?php

require_once 'conexion.php';

class Tipopago extends Conexion{

  private $acceso;

  public function __CONSTRUCT(){
    $this->acceso = parent::getConexion();
  }

  public function listarTipopago(){
    try{
      $consulta = $this->acceso->prepare("CALL spu_tipopago_listar()");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}


?>