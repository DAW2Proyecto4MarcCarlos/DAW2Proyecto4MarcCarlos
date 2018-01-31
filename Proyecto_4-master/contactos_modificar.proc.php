<?php
	session_start();
	error_reporting(0);
	include_once 'conexion.proc.php';

	$nomUsuari = $_SESSION['nombre'];
	$user_id = $_SESSION['id'];
	$contacto_id = $_REQUEST['id_contacto_seleccionado'];

	$foto_new=$_FILES["foto"]["name"];
			$ruta_new=$_FILES["foto"]["tmp_name"];
			$destino_new="img/".$foto_new;
			copy($ruta_new, $destino_new);
			echo $foto_new;
			echo $ruta_new;
			echo $destino_new;


	if ($foto_new != "") {
		$sql = 
		"UPDATE contacto 
		SET nombre='$_REQUEST[nombre]', 
		apellidos='$_REQUEST[apellidos]', 
		correo='$_REQUEST[correo]', 
		direccion='$_REQUEST[direccion]', 
		telf_prim='$_REQUEST[telf_prim]', 
		telf_sec='$_REQUEST[telf_sec]', 
		ubicacion_prim_lat='$_REQUEST[ubicacion_prim_lat]', 
		ubicacion_prim_lon='$_REQUEST[ubicacion_prim_lon]', 
		ubicacion_prim_lon='$_REQUEST[ubicacion_prim_lon]', 
		ubicacion_sec_lon='$_REQUEST[ubicacion_sec_lon]',
		img='$foto_new' 
		WHERE id = '$_REQUEST[id]'";
	}

	else{
		$sql = 
		"UPDATE contacto 
		SET nombre='$_REQUEST[nombre]', 
		apellidos='$_REQUEST[apellidos]', 
		correo='$_REQUEST[correo]', 
		direccion='$_REQUEST[direccion]', 
		telf_prim='$_REQUEST[telf_prim]', 
		telf_sec='$_REQUEST[telf_sec]', 
		ubicacion_prim_lat='$_REQUEST[ubicacion_prim_lat]', 
		ubicacion_prim_lon='$_REQUEST[ubicacion_prim_lon]', 
		ubicacion_prim_lon='$_REQUEST[ubicacion_prim_lon]', 
		ubicacion_sec_lon='$_REQUEST[ubicacion_sec_lon]' 
		WHERE id = '$_REQUEST[id]'";
		
	}


	$datos = mysqli_query($con, $sql);

	header("location: principal.php")

?>