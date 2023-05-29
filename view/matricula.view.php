<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
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
        <h4>Lista de Matriculas</h4>
        <hr>

        <div class="mb-3">
            <button type="button" class="btn btn-dark btn-sm" id="abrir-modal-registro" data-bs-toggle="modal" data-bs-target="#modal-registro-estudiante">
                <i class="fa-sharp fa-solid fa-file"></i> Registrar Matriculas
            </button>
    
            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modal-buscador">
                <i class="fa-sharp fa-solid fa-magnifying-glass"></i> Buscar Matricula
            </button>

        </div>

        <table class="table table-striped mt-4" id="tabla-empleados" width="100%">
            <colgroup>
                <col width="5%">    <!-- ID -->
                <col width="15%">   <!-- Ciclo -->
                <col width="15%">   <!-- Precio-->
            </colgroup>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ciclo</th>
                    <th>Precio</th>

                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div> <!-- Fin container -->