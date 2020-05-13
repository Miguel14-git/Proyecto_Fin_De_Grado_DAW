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
    <script src="js/jquery-3.4.1.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Almacenar Alumnos</title>
</head>
<body>
    <?php 
       
    
        require 'Pagina_Principal.php';
        
        $cadena_conexion = 'mysql:dbname=aulavirtual_instituto;host=localhost';
        $usuario = 'root';
        $clave ='';
        
        $bd = new PDO($cadena_conexion,$usuario,$clave);
        $select = "select Id_Alumno,Nombre, Nom_Usu, Email from Alumnos";
        $produ = $bd -> query($select);
        $filas = $produ->rowCount();

        $file = fopen("Fichero.txt","w");
        if ($filas !=0) {
    
            foreach($produ as $cant){
                fwrite($file, $cant["Id_Alumno"]." ".$cant['Nombre']. " ". $cant['Nom_Usu']. " ". $cant['Email'] .PHP_EOL);
                
            }
        }else{
            echo "no funciona";
        }
        print '<div class= "alert alert-light text-dark mt-2 text-center text-success">
                    Alumnos insertados en el fichero correctamente.
            </div>';
        fclose($file);

        
    ?>
   
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>
</html>