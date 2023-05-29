<?php

require_once 'conexion.php';

class Usuario extends Conexion{

  private $acceso;

  //Constructor
  public function __CONSTRUCT(){
    $this->acceso = parent::getConexion();
  }

  public function iniciarSesion($user = ""){
    try{
      $consulta = $this->acceso->prepare("CALL spu_usuarios_login(?)");
      $consulta->execute(array($user));

      return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

}

?>