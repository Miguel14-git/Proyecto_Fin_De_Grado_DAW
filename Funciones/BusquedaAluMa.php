<?php

    require_once "Conexion.php";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logoAula.png" type="image/png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
        
    <title>Busqueda Alumnos Matriculados</title>
</head>
<body>

    <div class="container-fluid justify-content-center">
<h1 class="text-center">Listado alumnos</h1>

    <?php



    echo "<div class= 'col-sm-12'>";
        echo "<ul class= 'list-group text-center ml-4'>";
        echo "<li class= 'list-group-item'> Id_Asignatura elegido :" . $id = $_POST['id_asignatura'] ;
        echo "</li>";
        echo "<li class= 'list-group-item'>Año Academico elegido :" .   $año = $_POST['año']; 
        echo "</li>";
        echo "</ul>";

    echo "</div>";

            $cadena_conexion = 'mysql:dbname=aulavirtual_instituto;host=localhost';
            $usuario = 'root';
            $clave ='';

            $bd = new PDO($cadena_conexion,$usuario,$clave);


        $select = "Select Id_Alumno from matricula where Id_Asignatura = '$id' and Año_Academico = '$año'";
        $test = $bd->query ($select);

       
        

    echo "<div class='col-sm-12'>";
        echo "<ul class= 'list-group mt-4 text-center ml-4'>";
            foreach ($test as $a){
                $id = $a['Id_Alumno'];

                $consulta = "Select Nombre from alumnos where Id_Alumno = $id";
                $resul = $bd -> query($consulta);

                foreach ($resul as $n){
                    $nombre = $n['Nombre'];
                }

                echo "<li class= 'list-group-item'>Id_Alumno  : " . $id . " " . $nombre ;
                echo "</li>";
        }
        echo "</ul>";
        echo "</div>";

    ?>
 
        <a href="../ListadoAlumnos.php" class="btn btn-success mt-3">Ir a listado de alumnos</a>
    </div>
    <script src="js/popper.min.js"></script>
</body>
</html>