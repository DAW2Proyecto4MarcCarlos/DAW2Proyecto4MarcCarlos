<?php
	session_start();
	error_reporting(0);
	include_once 'conexion.proc.php';

	$nomUsuari = $_SESSION['nombre'];
	$user_id = $_SESSION['id'];


	$foto_new=$_FILES["foto"]["name"];
			$ruta_new=$_FILES["foto"]["tmp_name"];
			$destino_new="img/".$foto_new;
			copy($ruta_new, $destino_new);
			echo $foto_new;
			echo $ruta_new;
			echo $destino_new;


	if ($foto_new != "") {
		$sql = "UPDATE usuario SET nombre='$_REQUEST[nombre]', pass=md5('$_REQUEST[pass]'), apellidos='$_REQUEST[apellidos]', correo='$_REQUEST[correo]', img='$foto_new' WHERE id = $user_id";
	}

	else{
		$sql = "UPDATE usuario SET nombre='$_REQUEST[nombre]', pass=md5('$_REQUEST[pass]'), apellidos='$_REQUEST[apellidos]', correo='$_REQUEST[correo]' WHERE id = $user_id";
		
	}

	//lanzamos la sentencia sql
	$datos = mysqli_query($con, $sql);

	header("location: principal.php")
?>