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
        <h4>Lista de Carreras</h4>
        <hr>

        <div class="mb-3">
            <button type="button" class="btn btn-dark btn-sm" id="abrir-modal-registro" data-bs-toggle="modal" data-bs-target="#modal-registro-carrera">
                <i class="fa-sharp fa-solid fa-file"></i> Registrar Carrera
            </button>
    
            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modal-buscador">
                <i class="fa-sharp fa-solid fa-magnifying-glass"></i> Buscar Carrera
            </button>

        </div>

        <table class="table table-striped mt-4" id="tabla-carreras" width="100%">
            <colgroup>
                <col width="5%">    <!-- ID -->
                <col width="15%">   <!-- Carrera -->
                <col width="15%">   <!-- Precio-->
                <col width="10%">   <!-- Comandos -->
            </colgroup>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Carrera</th>
                    <th>Precio</th>
                    <th>Comandos</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>     
    </div> <!-- Fin container -->

    <!-- Zonal de modales -->

    <!-- Primer modal: Registro de carreras -->
    <div class="modal fade" id="modal-registro-carrera" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div id="modal-registro-header" class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="modal-registro-titulo">Registro de carreras</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" autocomplete="off" id="formulario-carrera">             
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label for="carrera" class="form-label bold">Carrera:</label>
                                <input type="text" class="form-control form-control-sm" id="carrera">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="precio" class="form-label bold">Precio:</label>
                                <input type="text" class="form-control form-control-sm" id="precio">
                            </div>
                        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-sm btn-primary" id="guardar">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin primer modal -->

    <!-- Segundo modal: BUSCADOR DE CARRERAS-->
    <div class="modal fade" id="modal-buscador" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title" id="modalTitleId">Buscador Carrera</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="formulario-busqueda-carrera" autocomplete="off">

                        <div class="row mt-3">
                            <label for="" class="col-form-label col-sm-3 bold">Escriba </label>
                            <div class="col-sm-9">
                                <input type="search" class="form-control" id="" maxlength="" placeholder="Enter buscar">
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <label for="b-carrera" class="col-form-label col-sm-3">Carrera</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="b-carrera" readonly>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="b-precio" class="col-form-label col-sm-3">Precio:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="b-precio" readonly>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin del segundo modal -->

    <!-- Fin de zona modales -->
    

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
            let idcarrera = 0; //Actualizar - Eliminar

            function mostrarCarreras(){
                $.ajax({
                    url: '../controller/carrera.controller.php',
                    type: 'GET',
                    data: {'operacion': 'listarCarreras'},
                    success: function (result){
                        var tabla = $("#tabla-carreras").DataTable();
                        //Destruirlo
                        tabla.destroy();
                        //Poblar el cuerpo de la tabla
                        $("#tabla-carreras tbody").html(result);

                    }
                });
            }
            //Se ejecutan cuando la vista es mostrada
            mostrarCarreras();
        });
    </script>

</body>

</html>