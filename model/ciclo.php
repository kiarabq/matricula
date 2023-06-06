<?php
require_once 'conexion.php';

class Ciclo extends Conexion{

    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();
    }

    public function listarCiclo(){
        try{
            $consulta = $this->acceso->prepare("CALL spu_ciclo_listar()");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}

?>