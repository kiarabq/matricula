<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <!-- Estilos Bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <!-- DataTable -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/sistema.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <div class="col-8 barra">
                <h4 class="text-light">Sistema Matrículas</h4>
            </div>
            <div class="col-4 text-right barra">
                <ul class="navbar-nav mr-auto">
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <h4>Lista de Estudiantes</h4>

        <table class="table table-striped mt-4" id="tabla-estudiantes" width="100%">
            <colgroup>
                <col width="5%">    <!-- ID -->
                <col width="15%">   <!-- Apellidos -->
                <col width="15%">   <!-- Nombres-->
                <col width="15%">   <!-- DNI -->
                <col width="10%">   <!-- Género -->
                <col width="10%">   <!-- Celular -->
                <col width="10%">   <!-- Comandos -->
            </colgroup>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>DNI</th>
                    <th>Género</th>
                    <th>Celular</th>
                    <th>Comandos</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div> <!-- Fin container -->

    <!--Js Bootstrap 5.2-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <!-- AJAX = JavaScript asincrónico-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/2927838564.js" crossorigin="anonymous"></script>

    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Opcional -->
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function (){
            let datosNuevos = true;
            let idestudiante = 0; //Actualizar - Eliminar

            function mostrarEstudiantes(){
                $.ajax({
                    url: '../controller/estudiante.controller.php',
                    type: 'GET',
                    data: {'operacion': 'listarEstudiantes'},
                    success: function (result){
                        var tabla = $("#tabla-estudiantes").DataTable();
                        //Destruirlo
                        tabla.destroy();
                        //Poblar el cuerpo de la tabla
                        $("#tabla-estudiantes tbody").html(result);

                    }
                });
            }
            //Se ejecutan cuando la vista es mostrada
            mostrarEstudiantes();
        });
    </script>


</body>

</html>