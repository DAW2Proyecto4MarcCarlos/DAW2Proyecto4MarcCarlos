<?php
	session_start();
	error_reporting(0);

	$user_id = $_SESSION['id'];
	$foto = $_SESSION['img'];
	$nom_user=$_SESSION['nombre'];
	include 'conexion.proc.php';

	$foto=$_FILES["foto"]["name"];
	$ruta=$_FILES["foto"]["tmp_name"];
	$destino="img/".$foto;

	copy($ruta, $destino);
	$usuactual = $_SESSION['id'];

	$sql = "INSERT INTO contacto (nombre, apellidos, correo, direccion, telf_prim, telf_sec, ubicacion_prim_lat, ubicacion_prim_lon, img, id_usuario)  VALUES ('$_REQUEST[nombre]', '$_REQUEST[apellidos]', '$_REQUEST[correo]', '$_REQUEST[direccion]', '$_REQUEST[telefono_prim]', '$_REQUEST[telefono_sec]', '$_REQUEST[ubicacion_prim_lat]' , '$_REQUEST[ubicacion_prim_lon]', '$foto', '$usuactual')";
	$sql=utf8_decode($sql);

	//lanzamos la sentencia sql
	mysqli_query($con, $sql);

	$message = 'Contacto dado de alta';
	echo "	<SCRIPT type='text/javascript'> //not showing me this alert('$message');
			    window.location.replace(\"principal.php\");
			</SCRIPT>";
?>
