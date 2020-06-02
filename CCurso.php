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
    <title>Consultar Cursos</title>

<body>
    <?php
        require "Pagina_PrincipalA.php";
    ?>
    <hr>
    <div class="container-fluid">
    <?php

            
        

            $id = $_SESSION['id_usuario'];

            $select = "SELECT Id_Asignatura, Año_Academico FROM matricula WHERE Id_Alumno = '$id'";
            $curso = $mysqli-> query($select);
            $rows = $curso->num_rows;

            if ($rows === 0) {
                echo '<p> class="text-center display-4"> Ningún profesor te da clase
                </p>';
            } else {
        
                print '<div class="col-md-8 id="DT">';
                    print '<table id = "Tprofesores" class="table table-striped table-hover table-bordered alert-secondary">';
                        echo '<thead class="thead-dark">';
                        echo '<tr align="center">';
                        echo "<th align = 'center'> Asignaturas </th>";
                        echo "<th align = 'center'> Año_Academico </th>";
                        echo '</tr>';
                        echo '</thead>';
                        foreach($curso as $sql) {
                            $id = $sql['Id_Asignatura'];
                            $asig = "SELECT Nombre_Asignatura FROM asignaturas WHERE Id_Asignatura ='$id'";
                            $as = $mysqli-> query($asig);
                            echo '<tr align="center" >';
                            foreach($as as $s){
                                echo '<td align = "center" class="item" >' . $s['Nombre_Asignatura']. "</td>";
                            }
                            echo '<td align = "center" class="item">'. $sql['Año_Academico'].'</td>';
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