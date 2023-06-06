<?php

require_once '../model/matricula.php';

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
            <td>{$registro['idmatricula']}</td>
            <td>{$registro['apellidos']}</td>
            <td>{$registro['nombres']}</td>
            <td>{$registro['nombrecarrera']}</td>
            <td>{$registro['apellidos_docente']}</td>
            <td>{$registro['nombres_docente']}</td>
            <td>{$registro['mediopago']}</td>
            <td>{$registro['ciclo']}</td>
            <td>{$registro['precio']}</td>
            <td>{$registro['fecharegistro']}</td>
            <td>
                <a href='#' data-ideliminar='{$registro['idmatricula']}' class='btn btn-sm btn-danger eliminar'><i class='fa-solid fa-trash'></i></a>
                <a href='#' data-ideditar='{$registro['idmatricula']}' class='btn btn-sm btn-info editar'><i class='fa-solid fa-pencil'></i></a>
            </td>
        </tr>
        
        ";
      }
    }
  }

  if ($_GET['operacion'] == 'registrarMatricula'){
    
    $datos = [
       //$_GET[] datos enviados por la vista
      "apellidos"      => $_GET['apellidos'],
      "nombres"       => $_GET['nombres'],
      "dni"           => $_GET['dni'],
      "celular"    => $_GET['telefono'],
      "genero"      => $_GET['genero'],
      "idcarrera"     => $_GET['idcarrera'],
      "idusuario"     => 1,
      "iddocente"     => $_GET['iddocente'],
      "idtipopago"    => $_GET['idtipopago'],
      "idciclo"         => $_GET['idciclo'],
      "precio"        => $_GET['precio']
    ];

    //El array ya recibió los datos de la vista, procedemos a guardar
    $seregistro=$matricula->registrarMatricula($datos);
    echo json_encode(["success" => $seregistro, "message" => "Ya se registró"]);
  }

  if ($_GET['operacion'] == 'actualizarMatricula'){
    $datos = [
      "idmatricula"   => $_GET['idmatricula'],
      "idcarrera"     => $_GET['idcarrera'],
      "iddocente"     => $_GET['iddocente'],
      "idtipopago"    => $_GET['idtipopago'],
      "idciclo"         => $_GET['idciclo'],
      "precio"        => $_GET['precio']
    ];

    $matricula->actualizarMatricula($datos);
  }

  if ($_GET['operacion'] == 'eliminarMatricula'){
    $matricula->eliminarMatricula($_GET['idmatricula']);
  }

  if ($_GET['operacion'] == 'getData'){
    $data = $matricula->getData($_GET['idmatricula']);

    //dataType: 'JSON
    echo json_encode($data);
  }
}



?>