<?php

require_once '../model/carrera.php';

if (isset($_GET['operacion'])){

  //Instancia
  $carrera = new Carrera();

  if($_GET['operacion'] == 'listarCarreras'){
    $data = $carrera->listarCarreras();
    if ($data){
      echo "<option value='' selected>Seleccione</option>";
      foreach($data as $registro){
        echo "<option value='{$registro['idcarrera']}'>{$registro['nombrecarrera']}</option>";
      }
    }
  
  }

   if($_GET['operacion'] == 'listarCarrera'){
    $data = $carrera-> listarCarreras();
      //Enviamos datos para que la vista RENDERICE
      foreach($data as $registro){
        echo "
            <tr>
              <td>{$registro['idcarrera']}</td>
              <td>{$registro['nombrecarrera']}</td>
              <td>{$registro['precio']}</td>
              <td>
                <a href='#' data-ideliminar='{$registro['idcarrera']}' class='btn btn-sm btn-danger eliminar'><i class='fa-solid fa-trash'></i></a>
                <a href='#' data-ideditar='{$registro['idcarrera']}' class='btn btn-sm btn-info editar'><i class='fa-solid fa-pencil'></i></a>
              </td>
            </tr>
        ";
      }
      
    }
  }

?>