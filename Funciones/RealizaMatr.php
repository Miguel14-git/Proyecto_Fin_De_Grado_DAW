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

                echo "<hr>";
                $cadena_conexion = 'mysql:dbname=aulavirtual_instituto;host=localhost';
                $usuario = 'root';
                $clave ='';
    
                $bd = new PDO($cadena_conexion,$usuario,$clave);

                $id_alumno = $_POST['id'];
                $año = $_POST['año'];
                $id_asignatura = $_POST['asignatura'];

                $insert = "Insert into Matricula (Año_Academico,Id_Alumno,Id_Asignatura) values('$año','$id_alumno','$id_asignatura')";
                $resultado = $bd->query($insert);

                if($resultado === false){
                    echo '<p class="text-center display-4 mt-5">Matricula no realizado</p>';
                }else{
                    echo '<p class="text-center display-4 mt-5">Matricula realizada</p>';
                }


            ?>

            <a class='btn btn-success' href='../Matricula.php' role='button'>Ir a matricular alumnos</a>
        </div>
    </body>
</html>