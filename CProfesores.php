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
    <title>Consultar Profesores</title>

<body>
    <?php
        require "Pagina_PrincipalA.php";
    ?>
    <hr>
    <div class="container-fluid">
    <?php

            
        

            $id = $_SESSION['id_usuario'];

            $select ="SELECT Id_Asignatura FROM matricula WHERE Id_alumno = '$id' ";
            $alu = $mysqli-> query($select);
            $rows = $alu->num_rows;
            

            if ($rows === 0) {
                echo '<p class="text-center display-4"> Ningún profesor te da clase </p>';
            } else {
        
                print '<div class="col-md-8 id="DT">';
                    print '<table id = "Tprofesores" class="table table-striped table-hover table-bordered alert-secondary">';
                        echo '<thead class="thead-dark">';
                        echo '<tr align="center">';
                        echo "<th align = 'center'> Nombre </th>";
                        echo "<th align = 'center'> Apellidos </th>";
                        echo "<th align = 'center'> Asignatura </th>";
                        echo '</tr>';
                        echo '</thead>';
                        foreach($alu as $sql) {
                            
                            $id_Asignatura =  $sql['Id_Asignatura'];
                            $consul ="SELECT Nombre, Apellido1, Apellido2,Id_Profesor FROM profesores WHERE Id_Profesor in (SELECT Id_Profesor from impartir where Id_Asignatura = '$id_Asignatura' )";
                            $prof = $mysqli-> query($consul);
                            foreach ($prof as $s){
                                echo '<tr align="center">';
                                echo '<td align = "center" class="item" id='.$s['Id_Profesor'].'>' .$s['Nombre']. "</td>";
                                echo '<td align = "center" class="item" id='.$s['Id_Profesor'].'>' .$s['Apellido1']." ".$s['Apellido2']."</td>";

                                $select = "SELECT Nombre_Asignatura FROM asignaturas WHERE Id_Asignatura = '$id_Asignatura'";
                                $a = $mysqli-> query($select);
                                foreach($a as $s){
                                
                                    echo '<td align = "center" class="item">' .$s['Nombre_Asignatura']."</td>";
                                }  
                                    
                                echo '</tr>';
                                
                            }                          
                    
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