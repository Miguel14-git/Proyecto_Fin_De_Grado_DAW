<?php
$mysqli=new mysqli("localhost","root","","aulavirtual_instituto"); 
	
if(mysqli_connect_errno()){
    echo 'Conexion Fallida : ', mysqli_connect_error();
    exit();
}

function comprobar_sesion(){
	session_start();
	if(!isset($_SESSION['usuario'])){	
		header("Location: LoginP.php?redirigido=true");
	}		
}


function comprobar_sesion_alumno(){
    session_start();
	if(!isset($_SESSION['usuario'])){	
		header("Location: LoginA.php?redirigido=true");
	}
}
?>