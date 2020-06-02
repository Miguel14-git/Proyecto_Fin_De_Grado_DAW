<?php 

    require_once "Funciones/Conexion.php";
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" href="img/logoAula.png" type="image/png">
    <script src="js/jquery-3.5.1.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Alumnos</title>
</head>
<body>

    <?php 
    require 'Pagina_PrincipalP.php';?>
    <hr>
    <h1 class="text-center">Listado de Alumno</h1>

    <?php

            $cadena_conexion = 'mysql:dbname=aulavirtual_instituto;host=localhost';
            $usuario = 'root';
            $clave ='';

       $bd = new PDO($cadena_conexion,$usuario,$clave);
       $select = "select Id_Alumno,Nombre,Apellido1,Apellido2,Email,Nom_Usu from Alumnos";
       $prod = $bd -> query($select);

       if($prod) {
               
        print '<p class="text-center"> Consulta realizada sobre alumnos : ' .$count =$prod->rowCount() . '</p>' ;

            }else print_r($bd -> errorinfo());

            echo "<br>";
       

        if ($count !=0) {
    
            print '<div class="row d-flex justify-content-center">';
            print '<table style = width:65% class="table table-striped table-hover table-bordered bg-secondary">';
            echo '<thead class="thead-dark">';
            echo '<tr align="center">';
            echo "<th align = 'center'> ID </th>";
            echo "<th align = 'center'> Nombre </th>";
            echo "<th align = 'center'> Apellidos </th>";
            echo "<th align = 'center'> Email </th>";
            echo "<th align = 'center'> Nom_Usu </th>";
            echo '</tr>';
            echo '</thead>';
            foreach($prod as $sql) {
               
                echo '<tr align="center">';
                echo '<td align = "center">' . $sql['Id_Alumno']. "</td>";
                echo '<td align = "center">' .$sql['Nombre']. "</td>";
                echo '<td align = "center">' .$sql['Apellido1']. " ". $sql['Apellido2']."</td>";
                echo '<td align = "center">' .$sql['Email']. "</td>";
                echo '<td align = "center">' .$sql['Nom_Usu']. "</td>";
                echo '</tr>';
        
               
        
            }
            print "</table>";
            print "</div>";
        }

        $resultado = $bd ->query($select);
        $row = $resultado->rowCount();
      
            foreach($resultado as $a){
      
             $id = $a['Id_Alumno'];
             $nombre = $a['Nombre'];
             $usu = $a['Nom_Usu'];
             $email = $a['Email'];

           $array[] = array('ID'=> $id,'Nombre'=>$nombre,'Usuario'=>$usu,'Email'=>$email); 
         }

       
    
         /**
          * Funcion de PHP para convertir el array en forma de JSON
          */
         $json = json_encode($array);
      
         /**
          * Si el fichero existe abre el fichero y escribe, sino existe el fichero lo crea y escribe
          */
         $fh = fopen("alumnos.json", 'w');

         fwrite($fh, $json);
         fclose($fh);

    ?>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>
</html>