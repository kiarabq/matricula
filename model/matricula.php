<?php

//Conexion
require_once 'conexion.php';

class Matricula extends Conexion{
  private $acceso;

  public function __CONSTRUCT(){
    $this->acceso = parent :: getConexion();    
  }

  //Utilizará el spu_matriculas_listar
  public function listarMatriculas(){
    try{
      $consulta = $this->acceso->prepare("CALL spu_matriculas_listar()");
      $consulta->execute();

      $datosObtenidos = $consulta->fetchAll(PDO::FETCH_ASSOC); 
      return $datosObtenidos;
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  
}


?>