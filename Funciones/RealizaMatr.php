<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página de Matricula de Alumnos</title>
        <link rel="shortcut icon" href="../img/logoAula.png" type="image/png">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilo.css">
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
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

            $id_alumno = $_POST['id']. " ";
            $año = $_POST['año'] . " ";
            $id_asignatura = $_POST['asignatura'] . " ";

            $select = "Select Id_Asignatura from impartir where Año_Academico = '$año' and Id_Profesor = '$_SESSION[id_usuario]'";
            $test = $bd -> query($select);

            foreach ($test as $s){
            
                 $id = $s['Id_Asignatura'] . " ";
                 $año . "<br>";

                $tmp[] = $id;
            }

             implode(" ", $tmp);
            

                    echo '<form action="InsertarMatr.php" method="POST">';
                    print '<div class="row d-flex justify-content-center">';
                    print '<h1>Tabla de la busqueda del alumno a matricular</h1>';
                    print '<table style = width:65% class="table table-striped table-hover table-bordered">';
                    echo '<thead class="thead-dark">';
                    echo '<tr align="center">';
                    echo "<th align = 'center'> Codigo </th>";
                    echo "<th align = 'center'> Año_Academico </th>";
                    echo "<th align = 'center'> Id_Asignatura </th>";
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tr class = "text-center">';

                    echo '<td><select name="id_alumno" class="form-control">';
                    echo '<option>'.$id_alumno.'</option>';
                    echo '</select>';
                    echo '</td>';

                    echo '<td><select name="año_acade" class="form-control">';
                    echo '<option>'.$año.'</option>';
                    echo '</select>';
                    echo '</td>';

                    echo '<td><select name="id_asignatura" class="form-control">';
                        foreach ($tmp as $s){
                        
                            $consultar = "Select Nombre_Asignatura from asignaturas where Id_Asignatura = $s";
                            $r = $bd -> query($consultar);

                            foreach ($r as $as){
                                echo '<option>' .$s. $as['Nombre_Asignatura'].'</option>';
                            }
                        }               
                        echo '</select>';
                        echo '</td>';

                        

                    print "</tr>";
                    print "</table>";
                    print "</div>";
                    print '<input type="submit" name="enviar" value="Matricular Alumnos" class="mt-4 mb-4 ml-4 w-25 text-center btn btn-warning">';
                    echo '</form>';


        ?>
        <a class='btn btn-success' href='../Matricula.php' role='button'>Ir a matricular alumnos</a>
     
    <script src="../js/popper.min.js"></script>
    </body>
</html>