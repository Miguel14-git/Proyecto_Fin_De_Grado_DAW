<?php

    require_once "Funciones/Conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/logoAula.png" type="image/png">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Busqueda Asignaturas Impartidas</title>
</head>
<body>

<?php
    require "Pagina_Principal.php";
?>
       <hr>
    <h1 class="text-center">Listado de Asignaturas Impartidas por el profesor <?php echo $_SESSION["usuario"]?></h1>

    <?php

            $cadena_conexion = 'mysql:dbname=aulavirtual_instituto;host=localhost';
            $usuario = 'root';
            $clave ='';

       $bd = new PDO($cadena_conexion,$usuario,$clave);
       $select = "select Id_Asignatura, Año_Academico from impartir where Id_Profesor = $_SESSION[id_usuario] order by Id_Asignatura, Año_Academico ASC";
       $prod = $bd -> query($select);

       if($prod) {
               
        print '<p class="text-center"> Consulta realizada sobre impartir : ' .$count =$prod->rowCount() . '</p>' ;

            }else print_r($bd -> errorinfo());

            echo "<br>";
       

        if ($count !=0) {
    
            print '<div class="row d-flex justify-content-center">';
            print '<table style = width:65% class="table table-striped table-hover table-bordered bg-secondary">';
            echo '<thead class="thead-dark">';
            echo '<tr align="center">';
            echo "<th align = 'center'> ID_Asignatura </th>";
            echo "<th align = 'center'> Año_Academico </th>";
            echo '</tr>';
            echo '</thead>';
            foreach($prod as $sql) {
               
                echo '<tr align="center">';
                echo '<td align = "center">';
                    $id = $sql['Id_Asignatura'] ;
                    $consulta = "Select Nombre_Asignatura from asignaturas where Id_Asignatura = $id";
                    $test = $bd->query($consulta);
                foreach($test as $nom){
                    $nombre = $nom['Nombre_Asignatura'];
                }
                echo $id . " " . $nombre;
               
                echo "</td>";
                echo '<td align = "center">' .$sql['Año_Academico']. "</td>";
                echo '</tr>';
        
               
            }
            print "</table>";
            print "</div>";
        }

    ?>

    <script src="js/popper.min.js"></script>
</body>
</html>