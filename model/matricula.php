<?php

//Conexion
require_once 'conexion.php';

class Matricula extends Conexion{
  private $acceso;

  public function __CONSTRUCT(){
    $this->acceso = parent::getConexion();    
  }

  //Utilizará el spu_matriculas_listar
  public function listarMatriculas(){
    try{
      $consulta = $this->acceso->prepare("CALL spu_matriculas_listar()");
      $consulta->execute();

      $datosObtenidos = $consulta->fetchAll(PDO::FETCH_ASSOC);    //Arreglo asociativo
      return $datosObtenidos;
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  //Enviaremos un solo elemento (ARRAY ASOCIATIVO) conteniendo los 8 valores requeridos por el SPU
  public function registrarMatricula($datos = []){
    try{
      $consulta = $this->acceso->prepare("CALL spu_matriculas_registrar(?,?,?,?,?,?,?,?,?,?,?)");
      $consulta->execute(
        array(
          $datos['nombres'],
          $datos['apellidos'],
          $datos['dni'],
          $datos['celular'],
          $datos['genero'],
          $datos['idusuario'],
          $datos['idcarrera'],
          $datos['iddocente'],
          $datos['idtipopago'],
          $datos['idciclo'],
          $datos['precio']
        )
      );
      return true;
    }
    
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  //Similar el proceso de registro, añadiendo +idmatricula
  public function actualizarMatricula($datos = []){
    try{
      $consulta = $this->acceso->prepare("CALL spu_matriculas_actualizar(?,?,?,?,?,?)");
      $consulta->execute(
        array(
          $datos['idmatricula'],
          $datos['idcarrera'],
          $datos['iddocente'],
          $datos['idtipopago'],
          $datos['idciclo'],
          $datos['precio']
          
        )
        );
    }
    catch(Exception $e){
      die($e->getMessage());
    }

  }

  public function eliminarMatricula($idmatricula = 0){
    try{
      $consulta = $this->acceso->prepare("CALL spu_matriculas_eliminar(?)");
      $consulta->execute(array($idmatricula));
    }catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function getData($idmatricula = 0){
    try{
      $consulta = $this->acceso->prepare("CALL spu_matriculas_getdata(?)");
      $consulta->execute(array($idmatricula));
      return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  
}


?>