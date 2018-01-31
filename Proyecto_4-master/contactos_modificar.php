<?php
	session_start();
	error_reporting(0);
	include_once 'conexion.proc.php';	

	$nomUsuari = $_SESSION['nombre'];
	$user_id = $_SESSION['id'];
	$contacto_id = $_REQUEST['id'];

	
	$consulta_contactos = ("SELECT * FROM contacto where id = $contacto_id");
	$result_contactos = mysqli_query($con, $consulta_contactos);

	if(mysqli_num_rows($result_contactos)>0){
		$contacto=mysqli_fetch_array($result_contactos);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Página de login</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw3Cufv_vLKO64Dtg9nwU9QJBeDpAQwpw&callback=initMap"async defer></script>
	</head>
	<body>
		<div id="contactos">
			<div class="contact-form">
				<input type="image" src="img/off.png" onClick="window.location.href='principal.php'" style="float: left;width: 50px; height: 50px;">
				<h1 style="color: white">Modificar contacto</h1>
				<style type="text/css">

					#global {
					    background:#800000;
					    background-repeat: no-repeat;
					    background-size: 920px;
					    border-radius:4px;
					    border: 1px  solid #000000;
					    color: white;
					    -moz-border-radius:4px;
					    -webkit-border-radius:4px;
					    margin:25px auto;
					    height: 400px;
					    width: 450px;
					    border: 1px solid #800000;
					    overflow-y: scroll;
					}
					#mensajes {
					    height: auto;
					}
					.texto {
					    padding:4px;
					}
				</style>

				<div id="global">
   					<div id="mensajes">
        				<div class="texto">
     						<div class="form-group ">
								<form action="contactos_modificar.proc.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<input type="text" name="nombre" class="form-control" value="<?php echo $contacto['nombre']; ?>">
								</div>
								<div class="form-group">
									<input type="text" name="apellidos" class="form-control" value="<?php echo $contacto['apellidos']; ?>">
								</div>
								<div class="form-group">
									<input type="text" name="correo" class="form-control" value="<?php echo $contacto['correo']; ?>">
								</div>
								<div class="form-group">
									<input type="text" name="direccion" class="form-control" value="<?php echo $contacto['direccion']; ?>">
								</div>
								<div class="form-group">
									<input type="text" name="telf_prim" class="form-control" value="<?php echo $contacto['telf_prim']; ?>" onkeypress="return justNumbers(event);" maxlength="9" minlength="9">
								</div>
								<div class="form-group">
									<input type="text" name="telf_sec" class="form-control" value="<?php echo $contacto['telf_sec']; ?>"onkeypress="return justNumbers(event);" maxlength="9" minlength="9">
								</div>
								<div class="form-group">
									<input type="text" name="ubicacion_prim_lat" class="form-control" value="<?php echo $contacto['ubicacion_prim_lat']; ?>">
								</div>
								<div class="form-group">
									<input type="text" name="ubicacion_prim_lon" class="form-control" value="<?php echo $contacto['ubicacion_prim_lon']; ?>">
								</div>

<?php		
		$fichero="img/$contacto[img]";
		$foto = $contacto['img'];

		echo "<img src='$fichero' width='50' heigth='50' ></div></br>";
?>

								<input type="file" class="form-control" name="foto" id="foto"></br><br>

								<input type="hidden" name="id" value="<?php echo $contacto['id']; ?>">

								<input type="image" src="img/aceptar.png" name="acce" style="float: left;width: 50px; height: 50px;">

<?php

	}
?>
							</div>
    					</div>
    				</div>
    
				</div>
			</div>
		</div>

		<div id="contactMap">
			<script>
				var map;

				function initMap() {
					map = new google.maps.Map(document.getElementById('map'), {
						center: {lat: 41.384724, lng: 2.172798},
						zoom: 8
					});

					google.maps.event.addListener(map, 'click', function (e) {
						document.getElementsByName('ubicacion_prim_lat')[0].value = e.latLng.lat();
						document.getElementsByName('ubicacion_prim_lon')[0].value = e.latLng.lng();
						var marker=new google.maps.Marker({
							position:new google.maps.LatLng(e.latLng.lat(), e.latLng.lng()),
					});

					marker.setMap(map);
					});
				}

				function justNumbers(e) {
					var keynum = window.event ? window.event.keyCode : e.which;
					if ((keynum == 8) || (keynum == 46))
					return true;
					return /\d/.test(String.fromCharCode(keynum));
				}

    		</script>
        	<div id="map" style="width:600px;height:550px;"></div>
		</div>
	</body>
</html>