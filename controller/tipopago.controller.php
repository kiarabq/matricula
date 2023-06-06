<?php

require_once "../model/tipopago.php";

if (isset($_GET['operacion'])){

  $tipopago = new Tipopago();

  if ($_GET['operacion'] == 'listarTipopago'){

    //Renderizar los datos para la vista...
    $data = $tipopago->listarTipopago();

    //Verificando si tiene datos
    if ($data){
      echo "<option value='' selected>Seleccione</option>";
      foreach($data as $registro){
        echo "<option value='{$registro['idtipopago']}'>{$registro['mediopago']}</option>";
      }
    }

  }

}

?>