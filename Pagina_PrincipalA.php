<?php

require_once "Funciones/Conexion.php";

comprobar_sesion_alumno();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" href="img/logoAula.png" type="image/png">
    <script src="js/jquery-3.5.1.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina Principal</title>
</head>
<body>


    <div class="container-fluid justify-content-center">
        <p class="display-2 text-center alert alert-light text-dark">
            <img src="img/logoAula.png" alt="Logo"> Bienvenido Usuario <?php echo $_SESSION["usuario"] ?> <!--Aquí va el nombre del usuario correspondiente que inicie sesión-->
        </p>

        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-md navbar-light bg-info text-white d-flex justify-content-center">
                    <button class="navbar-toggler bg-warning" type="button" data-toggle="collapse" data-target="#navbarText">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto ">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="CProfesores.php">Consultar Profesores</a>
                            </li>
                        <li class="nav-item active">
                                <a class="nav-link text-white" href="CNotas.php">Ver Notas</a>
                        </li>
                        <li class="nav-item active">
                                <a class="nav-link text-white" href="CFaltas.php">Ver Faltas</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link text-white" href="CRetrasos.php">Ver Retrasos</a>
                            </li>
                            <li class="nav-item active">
                            <a class="nav-link text-white " href="CCurso.php">Consulta Curso</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link text-white" href="#" id="cerrar">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>


        <script>
        $('#cerrar').click(function(){
            var salir = confirm('¿Estás seguro de que quieres salir?');
            
            if(salir == true){
                location.href ="Logout.php";
            }
        })
    </script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>

</html>