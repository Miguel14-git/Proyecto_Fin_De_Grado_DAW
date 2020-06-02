<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Asignaturas a impartir</title>
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
                    echo "<p class='text-center display-4 mt-5'>El usuario $_SESSION[usuario] con ID : $usuario imparte la asignatura $nombre_asig en el año $año_academico</p>";
                }


            ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">  <a class='btn btn-success' href='../Asignaturas.php' role='button'>Ir a seleccionar asignaturas</a></button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
    
</div>

    <script src="../js/popper.min.js"></script>
    </body>
</html>