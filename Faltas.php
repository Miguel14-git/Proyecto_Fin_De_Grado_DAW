<?php
    require_once "Funciones/Conexion.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/logoAula.png" type="image/png">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Faltas</title>
</head>

<body>
    <?php
        require "Pagina_PrincipalP.php";
    ?>
    <hr>
    <div class="container-fluid">
    <?php
        $cadena_conexion = 'mysql:dbname=aulavirtual_instituto;host=localhost';
        $usuario = 'root';
        $clave ='';

        $bd = new PDO($cadena_conexion,$usuario,$clave);

        $profesores = "Select Id_Asignatura from impartir where Id_Profesor = $_SESSION[id_usuario]";
        $resultado = $bd -> query($profesores);

        $profesores2 = "Select Año_Academico from impartir where Id_Profesor = $_SESSION[id_usuario]";
        $resultado2 = $bd -> query($profesores2);


        echo '<form action="Funciones/RealizarFaltas.php" method="POST">';
        print '<div class="row d-flex justify-content-center">';
        print '<table style = width:65% class="table table-striped table-hover table-bordered">';
        echo '<thead class="thead-dark">';
        echo '<tr align="center">';
        echo "<th align = 'center'> Id_Asignatura </th>";
        echo "<th align = 'center'> Año_Academico </th>";
        echo '</tr>';
        echo '</thead>'; 
        echo '<tr class = "text-center">';
        echo '<td><select name="id_asignatura" class="form-control">';
        foreach ($resultado as $p){
            echo "<option>" . $id = $p['Id_Asignatura']. " ";
            $asignatura = "SELECT Nombre_Asignatura FROM asignaturas WHERE Id_Asignatura = $id";
            $resul = $bd->query($asignatura);
            foreach($resul as $nombre){
                echo $nombre['Nombre_Asignatura'];
            }
            echo "</option>";
        }
        echo '</select>';
        echo '</td>';

        echo '<td><select name="año" class="form-control">';
        foreach ($resultado2 as $p2){
            echo "<option>" .$p2['Año_Academico']."</option>";
        }
        echo '</select>';
        echo '</td>';

        print "</tr>";
        print "</table>";
        echo '</div>';
        print '<input type="submit" name="enviar" value="Enviar" class="mt-4 mb-4 ml-4 w-25 text-center btn btn-warning">';
        echo '</form>';
       
    ?>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>

</html>