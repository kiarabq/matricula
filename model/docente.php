<?php

require_once 'conexion.php';

class Docente extends Conexion{

  private $acceso;

  public function __CONSTRUCT(){
    $this->acceso = parent::getConexion();
  }

  public function listarDocentes(){
    try{
      $consulta = $this->acceso->prepare("CALL spu_docentes_listar()");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

}

?>