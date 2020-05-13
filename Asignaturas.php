<?php 

    require_once "Funciones/Conexion.php";
    comprobar_sesion();

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seleccionar Asignaturas a Impartir</title>
</head>
<body>

    <?php 
    require 'Pagina_Principal.php';
      print  '<h1 class="text-center">Selecciona Asignatura a Impartir</h1>';
            $cadena_conexion = 'mysql:dbname=aulavirtual_instituto;host=localhost';
            $usuario = 'root';
            $clave ='';

            $bd = new PDO($cadena_conexion,$usuario,$clave);

            $asig = "select Nombre_Asignatura from Asignaturas";
            $resul = $bd->query($asig);

            if($resul) {
               
                print '<p class="text-center"> Consulta realizada sobre asignaturas : ' .$count =$resul->rowCount() . '</p>' ;
        
                    }else print_r($bd -> errorinfo());
        
                    echo "<br>";

            if($count != 0){
                print '<div class="row justify-content-center">';
                print '<form action="Funciones/Impartir.php" method="post">';
                print '<label for="exampleFormControlSelect1">Asignaturas</label>';
                echo '<select name="nombre_asi" class="form-control" id="exampleFormControlSelect1">';
                foreach($resul as $s) {
                    echo '<option>'.$s['Nombre_Asignatura'].'</option>';
                }                
                echo '</select>';
                print '<input type="text" name="año" placeholder="Introduce año academico" class="mt-2">';
                print '<input type="submit" name="enviar" value="Enviar" class="mt-4 ml-3 d-flex btn btn-success">';
                print '</form>';
                print '</div>';
            }
        ?>
    <hr>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>
</html>