<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Realizacion de Retrasos</title>
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


                $id_alumno = $_POST['id_alumno'];
                $año = $_POST['año'];
                $id_asignatura = $_POST['asignatura'];
                $fecha = date("Y-m-d H:i:s", time());

               

                
                $insert = "Insert into retrasos (Id_Alumno,Id_Asignatura,Fecha_Hora,Año_Academico) values ('$id_alumno','$id_asignatura','$fecha','$año')";
                $resultado = $bd->query($insert);

                if($resultado === false){
                    echo '<p class="text-center display-4 mt-5">Retraso no insertado</p>';
                }else{
                    echo '<p class="text-center display-4 mt-5">Retraso insertado</p>';
                }


            ?>

            <a class='btn btn-success' href='../Retrasos.php' role='button'>Ir a poner retrasos</a>
        </div>
    </body>
</html>