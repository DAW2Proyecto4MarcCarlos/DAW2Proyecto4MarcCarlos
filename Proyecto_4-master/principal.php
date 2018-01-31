<?php
    session_start();
    error_reporting(0);
    $user_id = $_SESSION['id'];
    $foto = $_SESSION['img'];
    $nom_user=$_SESSION['nombre'];
    include 'conexion.proc.php';
    $consulta_contactos = "SELECT * FROM contacto where id_usuario = $user_id";
    $result_contactos = mysqli_query($con, $consulta_contactos);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Agenda</title>
        <link rel="icon" type="image/png" href="img/portada.png" />
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <script>
            function confirmDel(usuario) {
                var r = confirm("¿Quieres eliminar contacto?");
                if (r == true) {
                    location.href = "contactos_baja.proc.php?id="+usuario;
                } else {
                    //no hará nada
                }
            }
        </script>
        <script>
            function confirmar(){
                var txt;
                var r = confirm("¿Quieres eliminar tu cuenta?");
                if (r == true){
                    location.href = "usuarios_baja.proc.php";
                }else{
                    //no hará nada
                }
            }
        </script>
    </head>
    <body>
        <li>
            <img src="img/logo.png" style="width: 186px; height: 105px; float">
        </li>
        <div id="contactos">
            <ul>
                <li>
                    <div class="prin-img" style="margin-bottom: 5px;">
                        <input type="image" src="img/<?php echo $foto ?>" style="float: left; width: 55px; height: 55px;">
                    </div>
                </li>
                <li>
                    <h3 style="color: white ;margin-left: 10px;"><?php echo "Bienvenido " .$nom_user?></h3>
                </li>   
                <li class="lirigth">
                    <input type="image" src="img/off.png" onclick="window.location.href='index.php'" style="float: right; width: 50px; height: 50px;">
                </li>
                <li class="lirigth">
                    <input type="image" src="img/baja.png" onclick="confirmar()" style="float: right;width: 50px; height: 50px;">
                </li>
                <li class="lirigth">
                    <input type="image" src="img/edit.png" onclick="window.location.href='usuarios_modificar.php'" style="float: right;width: 50px; height: 50px;"></br> 
                </li>
            </ul>

            <div class="contact-form">


<?php
    if (isset($_SESSION['mail'])) {
?>

                <h2>Contactos</h2>
                <div class="prin-img" style="margin-bottom: 15px;">
                    <input type="image" src="img/add.png" onclick="window.location.href='contactos_insert.php'" style="float: right;width: 50px; height: 50px;"></br></br>
                </div>

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
                        margin: auto auto;
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

<?php
    } else {
        $_SESSION['error'] = "No te saltes pasos!";
        header("location: index.php");
    }
    $contactosArray = [];
    while ($contacto = mysqli_fetch_array($result_contactos)) {
        $fichero = "img/$contacto[img]";
        if (file_exists($fichero) && (($contacto['img']) != '')) {
            echo "<div class='perfil'><img src='$fichero' width='50' heigth='50'></div>";
        } else {
            echo "<div class='perfil'><img src ='img/no_disponible.jpg'width='50' heigth='50'/></div>";
        }
        echo "<b style='margin-top: 15px;'>Nombre:</b> ";
        echo utf8_encode($contacto['nombre']);
        echo "<br/>";
        echo "<b>Apellidos:</b> ";
        echo utf8_encode($contacto['apellidos']);
        echo "<br/>";
        echo "<b>Correo:</b> ";
        echo utf8_encode($contacto['correo']);
        echo "<br/>";
        echo "<b>Dirección:</b> ";
        echo utf8_encode($contacto['direccion']);
        echo "<br/>";
        echo "<b>Teléfono:</b> ";
        echo utf8_encode($contacto['telf_prim']);
        echo "<br/>";
        echo "<b>Teléfono secundario:</b> ";
        echo utf8_encode($contacto['telf_sec']);
        echo "<br/>";
        echo "<b>Ubicación:</b> ";
        echo utf8_encode($contacto['ubicacion_prim_lat']);
        echo ", ";
        echo utf8_encode($contacto['ubicacion_prim_lon']);
        echo "<br/>";

        $nombre_contacto = utf8_encode($contacto['nombre']) . " " . utf8_encode($contacto['apellidos']);
        $loc_lat = utf8_encode($contacto['ubicacion_prim_lat']);
        $loc_lon = utf8_encode($contacto['ubicacion_prim_lon']);

        $contactosArray[] = [
            'nombre' => $nombre_contacto,
            'latitud' => (float)$loc_lat,
            'longitud' => (float)$loc_lon,
        ];
        

?>

                                <a href="contactos_modificar.php?id=<?php echo $contacto['id']; ?>">
                                <input type="image" src="img/edit.png" onclick="window.location.href='contactos_modificar.php?id=<?php echo $contacto['id']; ?>" style="float: left;width: 50px; height: 50px;"></a>
                                <a href="contactos_baja.proc.php?id=<?php echo $contacto['id']; ?>">
                                <input type="image" src="img/baja.png" onclick="confirmDel()" style="float: left;width: 50px; height: 50px;"></br></a>
<?php 
    echo "<br/><br/>";
    }
?>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div id="contactMap">
            <div id="rutaOps">

            <br><br><br>
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw3Cufv_vLKO64Dtg9nwU9QJBeDpAQwpw&callback=initialize"
                async defer>    
            </script>
            <script>
                var map;
                var directionsDisplay;
                var image = 'img/green.png'

                
                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else {
                        x.innerHTML = "Geolocation is not supported by this browser.";
                    }
                }

                function showPosition(position) {
                    var marker2 = new google.maps.Marker({
                        position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
                        icon:image,
                    });
                    marker2.setMap(map);
                }
                
                function initialize() {
                    var myCenter = new google.maps.LatLng(41.384724, 2.172798);
                    var positions = <?php
                        echo json_encode($contactosArray);
                        ?>;
                    var mapProp = {
                        center: myCenter,
                        zoom: 9,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };

                    map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

                    for (var x in positions) {
                        var contacto = positions[x];
                        var marker = new google.maps.Marker({
                            map: map,
                            position: {
                                lat: contacto.latitud,
                                lng: contacto.longitud
                            },
                            opacity: 1,
                            animation: google.maps.Animation.DROP,  //DROP, BOUNCE
                            title: contacto.nombre
                        });

                        var infowindow = new google.maps.InfoWindow();
                        infowindow.setContent(contacto.nombre);
                        infowindow.open(map, marker);
                    }

                    directionsDisplay = new google.maps.DirectionsRenderer();
                    directionsDisplay.setMap(map);
                    directionsDisplay.setPanel(document.getElementById("panel_ruta"));

                    getLocation();
                }

            </script>
            <div id="googleMap"></div>
            <div id="panel_ruta"></div>
        </div>
    </body>
</html>