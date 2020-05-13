<?php
            require_once 'Funciones/Conexion.php';
            
			session_start();
			
 	
			if(isset($_SESSION["usuario"])){
				header("Location: Pagina_Principal.php");
			}
			
			if(!empty($_POST))
			{
				$usuario = mysqli_real_escape_string($mysqli,$_POST['Email']);
				$password = mysqli_real_escape_string($mysqli,$_POST['Contraseña']);
				$error = '';
				
				
				$sql = "SELECT Id_Profesor, Nombre, Apellido1,Email, Nom_Usu, Contraseña FROM Profesores WHERE Email = '$usuario' AND Contraseña = '$password'";
				$result=$mysqli->query($sql);
				$rows = $result->num_rows;
				
				if($rows > 0) {
					$row = $result->fetch_assoc();
					$_SESSION['usuario'] = $row['Nombre'];
                    $_SESSION['nombre_usuario'] = $row['Nom_Usu'];
                    $_SESSION['id_usuario'] = $row['Id_Profesor'];
					
					header("Location: Pagina_Principal.php");
					} else {
					$error = "El nombre o la clave son datos erroneos";
				}
			}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <title>Página de Inicio de sesion</title>
</head>
<body>
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="loginBox">
                        <img src="img/logoAula.png" alt="Logo">
                        <h2>Login</h2>

                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">									
                                <input type="email" class="form-control input-lg" name="Email" placeholder="Email" required>        
                            </div>							
                            <div class="form-group">        
                                <input type="password" class="form-control input-lg" name="Contraseña" placeholder="Contraseña" required>       
                            </div>							    
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                        </form>

                            <hr>
                            
                        <p><a href="#showForm" data-toggle="collapse" aria-expanded="false" aria-controls="collapse">¿Has perdido tu contraseña?</a></p>	
							<div class="collapse" id="showForm">
								<div class='well'>
									<form action="password-recovery.php" method="post">
										<div class="form-group">										
											<input type="email" class="form-control" name="email" placeholder="Enter the email associated with the password." required>
										</div>
										<button type="submit" class="btn btn-dark">Restablecer Contraseña</button>
									</form>								
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>
</html>