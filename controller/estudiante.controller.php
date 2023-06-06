<?php

require_once '../model/estudiante.php';

//Si existe una operación...
if (isset($_GET['operacion'])){

    //Instanciamos la clase Estudiante
    $estudiante = new Estudiante();

    if ($_GET['operacion'] == 'listarEstudiantes'){
        $data = $estudiante->listarEstudiantes();

        if ($data){
            //Enviamos datos para que la vista RENDERICE
            foreach($data as $registro){
                echo "
                    <tr>
                        <td>{$registro['idestudiante']}</td>
                        <td>{$registro['apellidos']}</td>
                        <td>{$registro['nombres']}</td>
                        <td>{$registro['dni']}</td>
                        <td>{$registro['genero']}</td>
                        <td>{$registro['celular']}</td>
                        <td>
                            <a href='#' data-ideliminar='{$registro['idestudiante']}' class='btn btn-sm btn-danger eliminar'><i class='fa-solid fa-trash'></i></a>
                            <a href='#' data-ideditar='{$registro['idestudiante']}' class='btn btn-sm btn-info editar'><i class='fa-solid fa-pencil'></i></a>
                        </td>
                    </tr>
                ";
            }
        }
    }


}
?>