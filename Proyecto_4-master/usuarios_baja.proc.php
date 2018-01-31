<?php
	session_start();
	error_reporting(0);
	include_once 'conexion.proc.php';	

	$nomUsuari = $_SESSION['nombre'];
	$user_id = $_SESSION['id'];

	
	$sql_update="DELETE FROM usuario WHERE id = $user_id";
	$sql_update2="DELETE FROM  contacto WHERE id_usuario = $user_id";

		mysqli_query($con,$sql_update)
		  or die("Problemas en el update".mysqli_error($con));

		mysqli_query($con,$sql_update2)
		  or die("Problemas en el update".mysqli_error($con));

		mysqli_close($con);
		
	header("Location: index.php");
?>