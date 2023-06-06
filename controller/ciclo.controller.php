<?php

require_once "../model/ciclo.php";

if (isset($_GET['operacion'])){

    $ciclo = new Ciclo();

    if ($_GET['operacion'] == 'listarCiclo'){
        
        $data = $ciclo->listarCiclo();

        //Verificando si tiene datos
        if ($data){
            echo "<option value='' selected>Seleccione</option>";
            foreach($data as $registro){
                echo "<option value='{$registro['idciclo']}'>{$registro['ciclo']}</option>";
            }
        }
    }
    
}

?>