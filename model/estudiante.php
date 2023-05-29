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

            $datosObtenidos = $consulta->fetchAll(PDO::FETCH_ASSOC);    //Arreglo asociativo
            return $datosObtenidos;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Enviaremos un solo elemento (ARRAY ASOCIATIVO) conteniendo los 6 valores requeridos por el SPU
    public function registrarEstudiante($datos = []){
        try{
            $consulta = $this->acceso->prepare("CALL spu_estudiantes_registrar(?,?,?,?,?,?)");
            $consulta->execute(
                array(
                    $datos['apellidos'],
                    $datos['nombres'],
                    $datos['dni'],
                    $datos['genero'],
                    $datos['celular'],
                    $datos['especialidad']
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

  }
?>