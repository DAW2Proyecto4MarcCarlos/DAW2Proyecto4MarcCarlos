<?php
	session_start();
	error_reporting(0);
	include("conexion.proc.php");

	$pass_encriptada=md5($_REQUEST['pass']);

	$sql = "SELECT * FROM usuario WHERE correo='$_REQUEST[mail]' AND pass='$pass_encriptada'";

	$resultado = mysqli_query($con,$sql);


	if(mysqli_num_rows($resultado)==1){
		$datos_usuario=mysqli_fetch_array($resultado);
		$_SESSION['id']=$datos_usuario['id'];
		$_SESSION['mail']=$_REQUEST['mail'];
		$_SESSION['nombre']=$datos_usuario['nombre'];
		$_SESSION['nivel']=$datos_usuario['usu_nivel'];
		$_SESSION['img']=$datos_usuario['img'];

		header("location: principal.php");

	} else {
		$_SESSION['error']="Usuario y contraseña incorrectos";
		header("location: index.php");
	}

?>