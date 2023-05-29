<?php

require_once '../model/estudiante.php';

//Si existe una operación...
if (isset($_GET['operacion'])){

  //Instanciamos la clase Matricula
  $matricula = new Matricula();

  if ($_GET['operacion'] == 'listarMatriculas'){
    $data = $matricula->listarMatriculas();

    if($data){
      //Enviamos datos para que la vista renderice
      foreach($data as $registro){
        echo "
            <tr>
            <td>{$registro['idematricula']}</td>
            <td>{$registro['ciclo']}</td>
            <td>{$registro['precio']}</td>
            <td>
                <a href='#' data-ideliminar='{$registro['idmatricula']}' class='btn btn-sm btn-danger eliminar'><i class='fa-solid fa-trash'></i></a>
                <a href='#' data-ideditar='{$registro['idmatricula']}' class='btn btn-sm btn-info editar'><i class='fa-solid fa-pencil'></i></a>
            </td>
        </tr>
        
        ";
      }
    }
  }
}



?>