<?php

//Se requiere la conexión
require_once 'conexion.php';

class Estudiante extends Conexion{

    //Este objeto almacena la conexión que trae Conexion.php
    //y que luego compartirá con TODOS los métodos...
    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();
    }

    //Utilizará el spu_estudiantes_listar
    public function listarEstudiantes(){
        try{
            $consulta = $this->acceso->prepare("CALL spu_estudiantes_listar()");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

  }
?>