<?php
	session_start();
	error_reporting(0);

	if(isset($_SESSION ['error'])){
		$error=$_SESSION['error'];
	}
	session_destroy();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>myContacts</title>
		<link rel="icon" type="image/png" href="img/portada.png" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	</head>
	<body>	
		<div class="login-form">
			<div class="prin-img" align="middle" style="margin-bottom: 10px;">
				<input type="image" src="img/portada.png" style="width: 200px; height: 100px;">
			</div>
     		<div class="form-group ">
				<form name="f1" action="login.proc.php" method="get">
				<input type="text" name="mail" class="form-control" placeholder="Correo" maxlength="50">
			</div>
				<div class="form-group">
			        <input type="password" name="pass" class="form-control" placeholder="Contraseña">
				    <i class="fa fa-lock"></i>
				</div>
				<span class="alert">Invalid Credentials</span>
    			<input type="image" src="img/aceptar.png" name="acce" style="width: 50px; height: 50px;">
				</form>
				<input type="image" src="img/add.png" onclick="window.location.href='usuarios_insert.php'" style="float:right; width: 50px; height: 50px;">  
		</div>
		
<?php
	echo "<div class='log-error'>";
		if(isset($error)){
			echo "ERROR: " . $error;
			echo "<br/><br/>";
		}
	echo "</div>";
?>		
	</body>
</html>