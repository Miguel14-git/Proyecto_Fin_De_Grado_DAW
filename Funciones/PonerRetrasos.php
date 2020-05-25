<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Realizacion de Notas</title>
        <link rel="shortcut icon" href="../img/logoAula.png" type="image/png">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilo.css">
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        
    </head>

    <body>
    
    <div class="container">

  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Abrir Mensaje
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Mensaje</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
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
                echo "<p class='text-center display-4 mt-5'>El alumno $id_alumno tiene el retraso en la asignatura $id_asignatura, en el año $año con fecha de $fecha</p>";
            }


        ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success"> <a class='btn btn-success' href='../Retrasos.php' role='button'>Ir a poner retrasos</a></button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
    
</div>

    <script src="../js/popper.min.js"></script>
    </body>
</html>