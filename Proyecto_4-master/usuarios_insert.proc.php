<?php
	include_once 'conexion.proc.php';
	error_reporting(0);

	$foto=$_FILES["foto"]["name"];
	$ruta=$_FILES["foto"]["tmp_name"];
	$destino="img/".$foto;
	copy($ruta, $destino);
	echo $foto;
	echo $ruta;
	echo $destino;

	$q = "SELECT * FROM usuario WHERE correo='$_REQUEST[correo]'";
	$correo=mysqli_query($con, $q);

	if(mysqli_num_rows($correo)>0){
		$message2 = 'Usuario existente';
		echo "<SCRIPT type='text/javascript'> //not showing me this
	        alert('$message2');
	        window.location.replace(\"usuarios_insert.php\");
	    	</SCRIPT>";

	} else {
		$q = "INSERT INTO usuario (nombre, apellidos, correo, pass, img) VALUES ('$_REQUEST[nombre]', '$_REQUEST[apellidos]', '$_REQUEST[correo]', md5('$_REQUEST[pass]'), '$foto')";
		mysqli_query($con, $q);
		$message = 'Usuario dado de alta';
		echo "	<SCRIPT type='text/javascript'> //not showing me this alert('$message');
	        		window.location.replace(\"index.php\");
	    		</SCRIPT>";
	}
?>

