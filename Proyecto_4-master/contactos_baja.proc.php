<?php
	session_start();
	error_reporting(0);
	include_once 'conexion.proc.php';	

	$nomUsuari = $_SESSION['nombre'];
	$user_id = $_SESSION['id'];
	$contacto_id = $_REQUEST['id'];

	$sql_update="DELETE from contacto where id = $contacto_id";
		mysqli_query($con,$sql_update)
		  or die("Problemas en el update".mysqli_error($con));

		mysqli_close($con);
	header("Location: principal.php");
?>