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
    <link rel="stylesheet" href="../css/sistema.css">

</head>

<body>
    <style>
            .bold{
                font-weight: bold;
            }
        </style>

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


    <div class="mt-4 ml-4"> 
        <h4>Lista de Matriculas</h4>
        <hr>

        <div class="mb-3">
            <button type="button" class="btn btn-dark btn-sm" id="abrir-modal-registro" data-bs-toggle="modal" data-bs-target="#modal-registro-matricula">
                <i class="fa-sharp fa-solid fa-file"></i> Registrar Matricula
            </button>
        </div>

        <table class="table table-striped mt-4" id="tabla-matriculas" width="100%">
            <colgroup>
                <col width="5%">    <!-- ID -->
                <col width="10%">   <!-- Apellidos -->
                <col width="5%">   <!-- Nombres -->
                <col width="5%">   <!-- Carrera -->
                <col width="15%">   <!-- Apellido Docente -->
                <col width="15%">   <!-- Nombre Docente -->
                <col width="10%">   <!-- Medio Pago-->
                <col width="5%">   <!-- Ciclo -->
                <col width="5%">   <!-- Precio-->
                <col width="15%">   <!-- Fecha Registro-->
                <col width="10%">   <!-- Comandos-->
            </colgroup>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Carrera</th>
                    <th>Apellidos Docente</th>
                    <th>Nombres Docente</th>
                    <th>Medio Pago</th>
                    <th>Ciclo</th>
                    <th>Precio</th>
                    <th>Fecha Registro</th>
                    <th>Comandos</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div> <!-- Fin container -->
    <!-- Zonal de modales -->

    <!-- Primer modal: REGISTRO DE MATRICULAS -->
    <div class="modal fade" id="modal-registro-matricula" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div id="modal-registro-header" class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="modal-registro-titulo">Registro de matriculas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" autocomplete="off" id="formulario-matricula">          
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label for="apellidos" class="form-label bold">Apellidos:</label>
                                <input type="text" class="form-control form-control-sm" id="apellidos">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="nombres" class="form-label bold">Nombres:</label>
                                <input type="text" class="form-control form-control-sm" id="nombres">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="dni" class="form-label bold">DNI:</label>
                                <input type="text" class="form-control form-control-sm" id="dni" maxlength="8">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="telefono" class="form-label bold">Teléfono:</label>
                                <input type="tel" class="form-control form-control-sm" id="telefono" maxlength="9">
                            </div>
                            <div class ="col-md-6 mt-3">
                            <label for="genero" class="form-label bold">Género:</label>
                            <select name="genero" id="genero" class="form-select">
                                <option value="">Seleccione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        </div>              
                        <div class= "row">
                        <div class ="col-md-6 mt-3">
                            <label for="carreras" class="form-label bold">Carrera:</label>
                            <select name="carreras" id="carreras" class="form-select">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="docentes" class="form-label bold">Docente:</label>
                            <select name="docentes" id="docentes" class="form-select">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                        <label for="tipopago" class="form-label bold">Medio de Pago:</label>
                            <select name="tipopago" id="tipopago" class="form-select">
                                <option value="">Seleccione</option>
                            </select>   
                        </div>
                        <div class ="col-md-6 mt-3">
                            <label for="ciclo" class="form-label bold">Ciclo:</label>
                            <select name="ciclo" id="ciclo" class="form-select">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                                <label for="precio" class="form-label bold">Precio:</label>
                                <input type="number" class="form-control form-control-sm" id="precio">
                            </div>
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
            let idmatricula = 0; //Actualizar - Eliminar

            function mostrarMatriculas(){
                $.ajax({
                    url: '../controller/matricula.controller.php',
                    type: 'GET',
                    data: {'operacion': 'listarMatriculas'},
                    success: function (result){
                        var tabla = $("#tabla-matriculas").DataTable();
                        //Destruirlo
                        tabla.destroy();

                        //Poblar cuerpo de la tabla
                        $("#tabla-matriculas tbody").html(result);

                        //Reconstruimos la tabla
                        $("#tabla-matriculas").DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                {
                                    extend: 'print',
                                    exportOptions: { columns: [0,1,2,3,4]}
                                }
                            ],
                            language: {
                                url: 'js/Spanish.json'
                            }
                        });
                    }
                });
            }

            function mostrarDocentes(){
                $.ajax({
                    url: '../controller/docente.controller.php',
                    type: 'GET',
                    data: {'operacion': 'listarDocentes'},
                    success: function (result){
                        $("#docentes").html(result);
                    }
                });
            }

            function mostrarCarreras(){
                $.ajax({
                    url: '../controller/carrera.controller.php',
                    type: 'GET',
                    data: {'operacion': 'listarCarreras'},
                    success: function(result){
                        $("#carreras").html(result);
                    }
                });
            }
            function mostrarTipopago(){
                $.ajax({
                    url: '../controller/tipopago.controller.php',
                    type: 'GET',
                    data: {'operacion': 'listarTipopago'},
                    success: function(result){
                        $("#tipopago").html(result);
                    }
                });
            }

            function mostrarCiclo(){
                $.ajax({
                    url: '../controller/ciclo.controller.php',
                    type: 'GET',
                    data: {'operacion': 'listarCiclo'},
                    success: function(result){
                        $("#ciclo").html(result);
                    }
                });
            }
            

            //Datos Nuevos / Actualizados
            function registrarMatricula(){
                let datosEnviar = {
                    'operacion'     : 'registrarMatricula',
                    'apellidos'     : $("#apellidos").val(),
                    'nombres'       : $("#nombres").val(),
                    'dni'           : $("#dni").val(),
                    'telefono'      : $("#telefono").val(),
                    'genero'        : $("#genero").val(),
                    'idcarrera'     : $("#carreras").val(),
                    'iddocente'     : $("#docentes").val(),
                    'idtipopago'    : $("#tipopago").val(),
                    'idciclo'       : $("#ciclo").val(),
                    'precio'        : $("#precio").val(),
                    'fecharegistro' : $("#fecharegistro").val()
                };
                //Actualización
                if (!datosNuevos){
                    //Array asociativo
                    datosEnviar["operacion"] = "actualizarMatricula";
                    datosEnviar["idmatricula"] = idmatricula;
                }
                if (confirm("¿Está segura de realizar esta acción")){
                    $.ajax({
                        url: '../controller/matricula.controller.php',
                        type: 'GET',
                        data: datosEnviar,
                        success: function(result){ 
                            console.log(result)
                            //Reiniciar el formulario
                            $("#formulario-matricula")[0].reset();

                            //Recargamos la tabla matriculas
                            mostrarMatriculas();

                            //Cerramos el modal
                            $("#modal-registro-matricula").modal('hide');           
                        }
                    });
                }
            }

            function eliminarMatricula(id){
                if (confirm("¿Está segura de eliminar el registro?")){
                    $.ajax({
                        url: '../controller/matricula.controller.php',
                        type: 'GET',
                        data: {
                            'operacion' : 'eliminarMatricula',
                            'idmatricula' : id
                        },
                        success: function(){
                            mostrarMatriculas();
                        }
                    });
                }
            }

            //El usuario pulsó clic en el botón editar
            function mostrarDatos(id){
                //1.- Limpiar formulario
                $("#formulario-matricula")[0].reset();
                //2.-Ejecutar una búsqueda de datos y mostrarlos en los controles
                $.ajax({
                    url: '../controller/matricula.controller.php',
                    type: 'GET',
                    data: {
                        'operacion' : 'getData',
                        'idmatricula' : id
                    },
                    dataType: 'JSON',
                    success: function (result){
                    $("#apellidos").val(result.apellidos);
                    $("#nombres").val(result.nombres);
                    $("#dni").val(result.dni);
                    $("#telefono").val(result.celular);
                    $("#genero").val(result.genero);
                    $("#carreras").val(result.idcarrera);
                    $("#docentes").val(result.iddocente);
                    $("#tipopago").val(result.idtipopago);
                    $("#ciclo").val(result.idciclo);
                    $("#precio").val(result.precio);
                        
                    }
                });

                //3.- Abrir modal
                $("#modal-registro-titulo").html("Actualización de datos");
                $("#modal-registro-header").removeClass("bg-primary");
                $("#modal-registro-header").addClass("bg-info");
                $("#guardar").html("Actualizar");
                datosNuevos = false;
                $("#modal-registro-matricula").modal("show");
            }
            //Proceso nuevo registro
            function abrirModalRegistro(){
                $("#modal-registro-titulo").html("Registro de matriculas");
                $("#modal-registro-header").removeClass("bg-info");
                $("#modal-registro-header").addClass("bg-primary");
                $("#guardar").html("Guardar");
                datosNuevos = true;
            }

            //Proceso de eliminación
            $("#tabla-matriculas tbody").on("click", ".eliminar", function (){
                idmatricula = $(this).data("ideliminar");
                eliminarMatricula(idmatricula);
            });

            //Editar
            $("#tabla-matriculas tbody").on("click",".editar", function (){
                idmatricula =$(this).data("ideditar");
                mostrarDatos(idmatricula);
            });

            $("#abrir-modal-registro").click(abrirModalRegistro);

            //Funciones asociadas a eventos
            $("#guardar").click(registrarMatricula);


            
            //Se ejecutan cuando la vista es mostrada
            mostrarMatriculas();
            mostrarDocentes();
            mostrarCarreras();
            mostrarTipopago();
            mostrarCiclo();

        });         
            
    </script>
</body>
</html>
