<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notas</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilo.css">
        <link rel="shortcut icon" href="../img/logoAula.png" type="image/png">
        <script src="../js/jquery-3.5.1.min.js"></script>
        
    </head>

    <body>
    <div class="container-fluid">
            <?php  
            
                require_once "Conexion.php";
                comprobar_sesion();

                echo "<hr>";
                $cadena_conexion = 'mysql:dbname=aulavirtual_instituto;host=localhost';
                $usuario = 'root';
                $clave ='';

                $bd = new PDO($cadena_conexion,$usuario,$clave);

                $id_asignatura = $_POST['id_asignatura'];
                $año = $_POST['año'];

                
                $consulta = "Select Id_Alumno From matricula where Id_Asignatura = '$id_asignatura' and Año_Academico = '$año'";
                $resul = $bd -> query($consulta);

              
                echo '<form action="PonerNotas.php" method="POST">';
                echo '<div class="row d-flex justify-content-center">';
                print '<table style = width:65% class="table table-striped table-hover table-bordered">';
                echo '<thead class="thead-dark">';
                echo '<tr align="center">';
                echo "<th align = 'center'> Id_Alumno/Nombre </th>";
                echo "<th align = 'center'> Id_Asignatura </th>";
                echo "<th align = 'center'> Año_Academico </th>";
                echo "<th align = 'center'> Nota Alumno </th>";
                echo '</tr>';
                echo '</thead>'; 
                echo '<tr class = "text-center">';
                echo '<td><select name="id_alumno" class="form-control">';
                foreach ($resul as $a){
                    echo "<option id='alumno'>" .$id = $a['Id_Alumno'] . " ";
                    $select = "SELECT Nombre FROM alumnos WHERE Id_Alumno = $id";
                    $res = $bd->query($select);

                    foreach($res as $nom){
                            echo $nom['Nombre'];
                    }
                    echo "</option>";
                }
                echo '</select>';
                echo '</td>';
                echo '<td><select name="asignatura" class="form-control">';
                echo "<option>" .$id_asignatura . " ";
                $asignatura = "SELECT Nombre_Asignatura FROM asignaturas WHERE Id_Asignatura = $id_asignatura";
                $test = $bd->query($asignatura);
        
                echo "</option>";
                echo '</select>';
                echo '</td>';
                echo '<td><select name="año" class="form-control">';
                echo "<option>" .$año."</option>";
                echo '</select>';
                echo '</td>';
                echo '<td><input type="number" name="nota" class="form-control" min=0 max=10 required>';
                echo '</td>';
                echo'</tr>';
                print "</table>";
                echo'</div>';
                print '<input id="botonEnviar" type="submit" name="enviar" value="Enviar" class="mt-4 mb-4 ml-4 w-25 text-center btn btn-warning" disabled>';
                echo '</form>';


               
                
            ?>

                <a class='btn btn-success' href='../Notas.php' role='button'>Ir a poner notas</a>
            
        </div>

        <script>
            var alumnos = document.getElementById("alumno");
            var boton = document.getElementById("botonEnviar");

            console.log(alumnos);

            if(alumnos != null){
                boton.removeAttribute('disabled');
            }

        </script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/popper.min.js"></script>
       
    </body>
</html>