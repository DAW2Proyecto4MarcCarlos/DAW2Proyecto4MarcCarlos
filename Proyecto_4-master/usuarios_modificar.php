<?php
	session_start();
	error_reporting(0);
	include_once 'conexion.proc.php';	

	$nomUsuari = $_SESSION['nombre'];
	$user_id = $_SESSION['id'];

	
	$consulta_usuarios = ("SELECT * FROM usuario where id = $user_id");
	$result_usuarios = mysqli_query($con, $consulta_usuarios);

	if(mysqli_num_rows($result_usuarios)>0){
		$user=mysqli_fetch_array($result_usuarios);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Página de login</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script>
			function valEmail(valor){
				re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*[.]([a-z]{2,3})$/
				if(!re.exec(valor)) {
					return false;
				}else{
					return true;
				}
			}

			function validar(){
				enviar=false;
				if(f1.pass.value==f1.repass.value){
					if(valEmail(f1.correo.value)){
						enviar=true;
					} else {
						alert("El email " + f1.correo.value + " es incorrecto.");
						enviar=false;
					}
				} else {
					alert("Las contraseñas no coinciden");
					enviar=false;
				}

				return enviar;
			}
		</script>
	</head>
	<body>
		<div class="mod-form">
			<h1>My Contacts</h1>
     		<div class="form-group ">
				<form name="f1" action="usuarios_modificar.proc.php" method="post" enctype="multipart/form-data" onsubmit="return validar();">
				<div class="form-group">
					<input type="text" name="nombre" class="form-control" value="<?php echo $user['nombre']; ?>"><br>
				</div>
				<div class="form-group">
					<input type="text" name="apellidos" class="form-control" value="<?php echo $user['apellidos']; ?>"><br>
				</div>
				<div class="form-group">
					<input type="text" name="correo" class="form-control" value="<?php echo $user['correo']; ?>"><br>
				</div>
				<div class="form-group">
					<input type="password" name="pass" class="form-control" placeholder="Contraseña" required><br>
				</div>
				<div class="form-group">
					<input type="password" name="repass" class="form-control" placeholder="Repetir contraseña" required><br>
				</div>

<?php		
	$fichero="img/$user[img]";
	$foto = $user['img'];

	echo "<img src='$fichero' width='50' heigth='50' ></div></br>";
?>
				
				<input type="file" name="foto" class="form-control" id="foto"></br><br>
				<input type="hidden" name="id_usuario_seleccionado" value="<?php echo $id_anterior; ?>">
				<input id="boton" type="image" src="img/aceptar.png" onClick="validar()" style="width: 50px; height: 50px;">
				<input type="image" src="img/off.png" onClick="window.location.href='principal.php'" style="float:right;width: 50px; height: 50px;">

<?php

	}
?>
			</div>
		</div>	
	</body>
</html>