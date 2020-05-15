<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Busqueda Alumnos</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilo.css">
        <script src="../js/jquery-3.4.1.min.js"></script>
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

                $pagina = file_get_contents("../Fichero.txt");
                $alumno_busqueda = $_POST['nombre'];
                $pos = strpos($pagina,$alumno_busqueda);

                $select = "select Id_Alumno,Nombre from Alumnos Where Nombre Like '%$alumno_busqueda%'";
                $alu = $bd -> query($select);

                $consulta_impartir = "Select Año_Academico,Id_Asignatura from Impartir where Id_Profesor = $_SESSION[id_usuario]";
                $resultado = $bd->query($consulta_impartir);

                $consulta_impartir2 = "Select Id_Asignatura from Impartir where Id_Profesor = $_SESSION[id_usuario]";
                $resultado2 = $bd->query($consulta_impartir2);
                

                if($pos === false){
                    echo '<p class = "display-4 text-center" > La cadena ' .$alumno_busqueda . ' no se encuentra en el fichero <p>';
                }else{
                    echo '<form action="RealizaMatr.php" method="POST">';
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
                    echo '<td><select name="id" class="form-control">';
                    foreach($alu as $sql) {
                        
                            echo '<option>'.$sql['Id_Alumno'].'</option>';             
                        }
                        echo '</select>';
                        echo '</td>';

                        echo '<td align="center"><select name="año" class="form-control">';
                        foreach($resultado as $año){
                                echo '<option>'.$año['Año_Academico'].'</option>';
                        }
                        echo '</select>';
                        echo '</td>';
                    
                        echo '<td><select name="asignatura" class="form-control">';
                        foreach($resultado2 as $s) {
                            echo '<option>'.$s['Id_Asignatura'].'</option>';
                        }                
                        echo '</select>';
                        echo '</td>';

                        

                    print "</tr>";
                    print "</table>";
                    print "</div>";
                    print '<input type="submit" name="enviar" value="Matricular Alumnos" class="mt-4 mb-4 ml-4 w-25 text-center btn btn-warning">';
                    echo '</form>';
                }
               
            ?>

            <a class='btn btn-success' href='../Matricula.php' role='button'>Ir a matricular alumnos</a>
        </div>
    </body>
</html>