<?php
	
	require_once 'Funciones/Conexion.php';	
	comprobar_sesion();
	$_SESSION = array();
	session_destroy();	
	setcookie(session_name(), 123, time() - 1000); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    	<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="shortcut icon" href="img/logoAula.png" type="image/png">
		<title>Sesión cerrada</title>
		<link rel="stylesheet" href="css/estilo.css">
		<script src="js/jquery-3.5.1.min.js"></script>
	</head>
	<body>

	<div class="container-fluid justify-content-center">
		<div class="row d-flex">
				<div class="col-sm-10">
					<div class="card">
						<div class="loginBox">
							<p class="alert alert-primary text-center">
								La sesión se cerró correctamente, hasta la próxima
							</p>
							<a href = "Pagina_Bienvenida.html">Ir a la página inicial</a>
						</div>
					</div>
				</div>
		</div>
	</div>
		
		


		<script src="js/bootstrap.min.js"></script>
		<script src="js/popper.min.js"></script>
	</body>
</html>