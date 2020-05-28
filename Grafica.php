<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/grafica.css">
    <link rel="shortcut icon" href="img/logoAula.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Grafica</title>
</head>
<body>

<?php

    require_once "Funciones/Conexion.php";
    require 'Pagina_Principal.php';?>

<div class="container-fluid">
    
        <div class="row m-3">
            <div class="col-md-12 alert alert-secondary text-center">
                <p class="display-4">Grafica</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 alert alert-secondary border border-light rounded-sm text-center">
                <table class="table table-hover table-danger">
                <thead class="thead-dark text-white text-uppercase">
                            <tr>
                                <th>Alumno</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo" class="text-white text-uppercase">

                        </tbody>
                </table>
            </div>
            <div class="col alert alert-secondary border border-light rounded-sm text-center">
                <h3>Grafica</h3>
                <div class="row text-center m-2 notas" id="notas">
                    
                        <canvas id="canvas" width="700px" height="450px"></canvas>
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <fieldset class="insertar">
                    <legend>Introduce los datos</legend>
                    <form>
                        <div class="form-group" draggable="true">
                            <input type="file" class="from-control-file" id="fichero">
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    
</div>
    <script src="js/grafica.js"></script>
    <script src="js/fichero.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <?php

    $cadena_conexion = 'mysql:dbname=aulavirtual_instituto;host=localhost';
    $usuario = 'root';
    $clave ='';
    
    $bd = new PDO($cadena_conexion,$usuario,$clave);

    $impartir = "SELECT Año_Academico,Id_Asignatura FROM impartir WHERE Id_Profesor = $_SESSION[id_usuario]";
    $resultado = $bd->query($impartir);

    foreach ($resultado as $i){
        $i['Año_Academico'];
        $i['Id_Asignatura'];

        $select = "Select Id_Alumno,Numero From Notas Where Id_Asignatura = '$i[Id_Asignatura]' and Año_Academico = '$i[Año_Academico]'";
        $resul = $bd ->query($select); 

        foreach ($resul as $alu){
            $id = $alu['Id_Alumno'] ;

            $consulta = "Select Nombre From Alumnos where Id_Alumno = '$id'";
            $resul2 = $bd ->query($consulta);

            foreach ($resul2 as $nom){
                $nombre = $nom['Nombre'] ;
            }
              $nota = $alu['Numero'] ;

            $array[] = array('nombre'=> $nombre,'nota'=>$nota);
        }
    }

         $json = json_encode($array);
         $fh = fopen("notas.json", 'w');

         fwrite($fh, $json);
         fclose($fh);
?>


    
</body>
</html>