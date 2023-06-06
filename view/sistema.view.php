<?php
session_start();

//Buscamos la consición en donde el usuario NO DEBE INGRESAR A ESA VISTA
//Comprobamos si el usuario realmente inició sesión...
if(!isset($_SESSION['seguridad']) || $_SESSION['seguridad']['login'] == false){
        //Cambiar a otra URL
        header('Location: ../index.php');
}
?>
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
                    <li>
                        <a href="#" class="px-3 text-light perfil dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle user"></i></a>

                        <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
                            <a class="dropdown-item menuperfil cerrar" href="../index.php"><i class="fas fa-sign-out-alt m-1"></i>Cerrar sesión
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="barra-lateral col-12 col-sm-auto">
                <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                    <a href=""><i class="fas fa-home"></i><span>Inicio</span></a>
                    <a href="./matricula.view.php"><i class=""></i><span>Matriculas</span></a>
                    <a href="./estudiante.view.php"><i class=""></i><span>Estudiantes</span></a>
                    <a href="./carrera.view.php"><i class=""></i><span>Carreras</span></a>
                </nav>
            </div>
            <main class="main col">
                    <div class="columna col-lg-6">
                    <!--grafico -->
                    <h4>Gráfico</h4>
                    <div class="col-md-12">
                        <canvas id="grafico"></canvas>          
                    </div>
                    <div class="col-md-6">
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <script>
                        document.addEventListener("DOMContentLoaded", ()=>{
                        const  lienzo = document.getElementById("grafico");

                        const graficoBarras = new Chart(lienzo, {
                            type: 'bar',
                            data:{
                            labels: ['Arquitectura','Administración','Contabilidad','Psicología'],
                            datasets: [
                                {
                                borderColor: '#E74C3C',
                                backgroundColor: ['#2E86C1','#1D8348','#909497','#F1C40F'],
                                label: 'Carreras Matriculadas',
                                data: [5,10,15,20,25],
                                borderWidth: 1
                                }          
                            ]
                            }
                        })
                        });                    

                    </script>

                </div>
            </main>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/646c794df3.js"></script>

    
</body>

</html>