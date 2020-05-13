<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página de Registro Profesores</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilo.css">
        <script src="../js/jquery-3.4.1.min.js"></script>
    </head>

    <body>
    <div class="container-fluid">
            <?php  
                
                require_once "Conexion.php";
                comprobar_sesion();
                $cadena_conexion = 'mysql:dbname=aulavirtual_instituto;host=localhost';
                $usuario = 'root';
                $clave ='';
    
                $bd = new PDO($cadena_conexion,$usuario,$clave);


                $año_academico = $_POST['año'];
                $nombre_asig = $_POST['nombre_asi'];
                $usuario = $_SESSION['id_usuario'];
               


                $consulta_asignatura = "Select Id_Asignatura from Asignaturas where Nombre_Asignatura like '%$nombre_asig%'";
                $result = $bd->query($consulta_asignatura);

                foreach ($result as $a) {
                  $id = $a['Id_Asignatura'];
                }

                $insert = "Insert into Impartir (Año_Academico,Id_Profesor,Id_Asignatura) values ('$año_academico','$usuario','$id')";
                $consulta = $bd->query($insert);

                if ($consulta == false){
                    echo '<p class="text-center display-4 mt-5">Asignatura Impartida No Realizada Correctamente</p>';
                }else{
                    echo '<p class="text-center display-4 mt-5">Asignatura Impartida Realizada Correctamente</p>';
                }


            ?>
            <a class='btn btn-outline-success' href='../ListadoAlumnos.php' role='button'>Ir a listado alumnos</a>
        </div>
    </body>
</html>