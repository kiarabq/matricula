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
        <h4>Lista de Estudiantes</h4>
        <hr>

        <div class="mb-3">
            <button type="button" class="btn btn-dark btn-sm" id="abrir-modal-registro" data-bs-toggle="modal" data-bs-target="#modal-registro-estudiante">
                <i class="fa-sharp fa-solid fa-file"></i> Registrar Estudiante
            </button>
    
            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modal-buscador">
                <i class="fa-sharp fa-solid fa-magnifying-glass"></i> Buscar Estudiante
            </button>

        </div>

        <table class="table table-striped mt-4" id="tabla-estudiantes" width="100%">
            <colgroup>
                <col width="5%">    <!-- ID -->
                <col width="15%">   <!-- Apellidos -->
                <col width="15%">   <!-- Nombres-->
                <col width="15%">   <!-- DNI -->
                <col width="10%">   <!-- Género -->
                <col width="10%">   <!-- Celular -->
                <col width="20%">   <!-- Especialidad -->
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
                    <th>Especialidad</th>
                    <th>Comandos</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div> <!-- Fin container -->

    <!-- Zonal de modales -->

    <!-- Primer modal: Registro de estudiantes -->
    <div class="modal fade" id="modal-registro-estudiante" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div id="modal-registro-header" class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="modal-registro-titulo">Registro de estudiantes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" autocomplete="off" id="formulario-estudiante">             
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label for="apellidos" class="form-label bold">Apellidos:</label>
                                <input type="text" class="form-control form-control-sm" id="apellidos">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="nombres" class="form-label bold">Nombres:</label>
                                <input type="text" class="form-control form-control-sm" id="nombres">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label for="dni" class="form-label bold">DNI:</label>
                                <input type="text" class="form-control form-control-sm" id="dni" maxlength="8">
                            </div>
                            <div>
                            <label for="genero" class="form-label bold">Género:</label>
                            <select name="genero" id="genero" class="form-select">
                                <option value="">Seleccione</option>
                                <option value="">M</option>
                                <option value="">F</option>
                            </select>
                        </div>
                            <div class="col-md-6 mt-3">
                                <label for="celular" class="form-label">Celular:</label>
                                <input type="cel" class="form-control form-control-sm" id="celular" maxlength="9" placeholder="Campo opcional">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="especialidad" class="form-label">Especialidad:</label>
                            <input type="text" class="form-control form-control-sm" id="especialidad" placeholder="Campo opcional">
                        </div>
                    </form> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-sm btn-primary" id="guardar">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin primer modal -->

    <!-- Segundo modal: BUSCADOR-->
    <div class="modal fade" id="modal-buscador" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title" id="modalTitleId">Buscador Estudiante</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="formulario-busqueda-estudiante" autocomplete="off">

                        <div class="row mt-3">
                            <label for="b-dni" class="col-form-label col-sm-3 bold">Escriba </label>
                            <div class="col-sm-9">
                                <input type="search" class="form-control" id="" maxlength="" placeholder="Enter buscar">
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <label for="b-apellidos" class="col-form-label col-sm-3">Apellidos</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="b-apellidos" readonly>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="b-nombres" class="col-form-label col-sm-3">Nombres:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="b-nombres" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label for="dni" class="form-label bold">DNI:</label>
                                <input type="text" class="form-control form-control-sm" id="dni" maxlength="8">
                            </div>

                        <div class="row mt-3">
                            <label for="b-genero" class="col-form-label col-sm-3">Género:</label>
                            <div class="col-sm-9">
                                <input type="genero" class="form-control" id="b-genero" readonly>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="b-celular" class="col-form-label col-sm-3">Celular:</label>
                            <div class="col-sm-9">
                                <input type="cel" class="form-control" id="b-celular" maxlength="9" readonly>
                            </div>
                        </div>                 

                        <div class="row mt-3">
                            <label for="b-especialidad" class="col-form-label col-sm-3">Especialidad:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="b-especialidad" readonly>
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