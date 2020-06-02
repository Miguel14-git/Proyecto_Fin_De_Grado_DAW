<?php 

    require_once "Funciones/Conexion.php";
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="shortcut icon" href="img/logoAula.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/grafica.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matricula Alumnos</title>
</head>
<body>

    <?php 
    require 'Pagina_PrincipalP.php';
            $cadena_conexion = 'mysql:dbname=aulavirtual_instituto;host=localhost';
            $usuario = 'root';
            $clave ='';

            $bd = new PDO($cadena_conexion,$usuario,$clave);
        ?>
    <hr>
    <h1 class="text-center">Alumnos Registrados en la Base de Datos(Almacenado fichero)</h1>


<div class="container-fluid">

<div class="row">
            <div class="col-sm-12">
                <fieldset class="insertar">
                    <legend>Introduce los datos</legend>
                    <form>
                        <div class="form-group" draggable="true">
                            <input type="file" class="from-control-file" id="fichero">
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-12 alert alert-secondary">
            
                <ul id="lista_alumnos" class="list-group">

                </ul>
            </div> 
        </div>
        <hr>
        <h1 class="text-center">Matricula Alumnos</h1>
        <div class="row justify-content-center">
        <div class="col-sm-4">
        <form action="Funciones/BusquedaMatr.php" method="POST" > 
            <div class="form-group">
					<label class="col-label-md mt-3">¿Que alumno desea matricular?</label>
						<input id="usuario" name="nombre" type="text" class="form-control form-control-md" placeholder="Introduce alumno a buscar">
			</div>
                    <div>
						<input name="login" type="submit" value="Entrar" class="btn btn-success mb-2">
					</div>
        </form>
        </div>
    </div>
</div>

    <script src="js/matricula.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>
</html>