<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página de Notas De Alumnos</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilo.css">
        <link rel="shortcut icon" href="../img/logoAula.png" type="image/png">
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMatric">
  Abrir Mensaje
</button>

<!-- The Modal -->
<div class="modal" id="modalMatric">
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

            $alumno = $_POST['id_alumno']. " ";
            $año_academico = $_POST['año_acade'] . " ";
            $id_asignatura = $_POST['id_asignatura'] . " ";
            $nota = $_POST['notas'];


            $insert = "Insert into notas (Id_Alumno,Id_Asignatura,Numero,Año_Academico) values ('$alumno','$id_asignatura','$nota','$año_academico')";
             $resultado = $bd->query($insert);
 
             if($resultado === false){
                 echo '<p class="text-center display-4 mt-5">Nota no realizada</p>';
             }else{
                echo "<p class='text-center display-4 mt-5'>El alumno $alumno tiene la nota $nota en la asignatura $id_asignatura y en el año $año_academico</p>";
             }


        ?>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success"><a class='btn btn-success' href='../Notas.php' role='button'>Ir a poner notas</a></button>
      </div>
      
    </div>
  </div>
</div>
</div>
<script src="../js/popper.min.js"></script>
</body>
</html>