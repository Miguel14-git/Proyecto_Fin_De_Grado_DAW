<?php

    require_once "Funciones/Conexion.php";

?>

<!DOCTYPE html>
<html lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/logoAula.png" type="image/png">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo1.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Consultar Faltas</title>

<body>
    <?php
        require "Pagina_PrincipalA.php";
    ?>
    <hr>
    <div class="container-fluid">
    <?php

            
            /*$cadena_conexion = 'mysql:dbname=aulavirtual_instituto;host=localhost';
            $usuario = 'root';
            $clave ='';

            $bd = new PDO($cadena_conexion,$usuario,$clave);*/

            $id = $_SESSION['id_usuario'];

            $select = "SELECT Id_Asignatura, Fecha_Hora, Año_Academico FROM faltas WHERE Id_Alumno = '$id'";
            $faltas = $mysqli-> query($select);
            $rows = $faltas->num_rows;

            

            if ($rows === 0) {
                echo '<p class="text-center display-4"> No tienes ninguna falta o no te da clase ningun profesor
                </p>';
            } else {
        
                print '<div class="col-md-8 id="DT">';
                    print '<table id = "Tprofesores" class="table table-striped table-hover table-bordered alert-secondary">';
                        echo '<thead class="thead-dark">';
                        echo '<tr align="center">';
                        echo "<th align = 'center'> Asignatura </th>";
                        echo "<th align = 'center'> Año_Academico </th>";
                        echo "<th align = 'center'> Dia y hora </th>";
                        echo '</tr>';
                        echo '</thead>';
                        foreach($faltas as $f) {
                            $fal = $f['Id_Asignatura'];
                            $s = "SELECT Nombre_Asignatura FROM asignaturas WHERE Id_Asignatura ='$fal'";
                            $a = $mysqli-> query($s);
                            echo '<tr align="center" >';
                            foreach($a as $as){
                                echo '<td align = "center" class="item" >' . $as['Nombre_Asignatura']. "</td>";
                            }     
                            echo '<td align = "center" class="item" >' .$f['Año_Academico']. "</td>";                 
                            echo '<td align = "center" class="item" >' .$f['Fecha_Hora']. "</td>";
                            echo '</tr>';
                    
                        }
                    print "</table>";
                print "</div>";
            }
        


       
        ?>


       
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>

</html>