<?php

require_once "../model/docente.php";

if (isset($_GET['operacion'])){

  $docente = new Docente();

  if ($_GET['operacion'] == 'listarDocentes'){

    //Renderizar los datos para la vista...
    $data = $docente->listarDocentes();

    //Verificando si tiene datos
    if ($data){
      echo "<option value='' selected>Seleccione</option>";
      foreach($data as $registro){
        echo "<option value='{$registro['iddocente']}'>{$registro['apellidos']}{$registro['nombres']}</option>";
      }
    }

  }

}

?>