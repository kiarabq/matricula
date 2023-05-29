<?php

require_once '../model/carrera.php';

if (isset($_GET['operacion'])){

  //Instancia
  $carrera = new Carrera();

  if($_GET['operacion'] == 'listarCarreras'){
    $data = $carrera->listarCarreras();

    if($data){
      
    }
  }
}


?>