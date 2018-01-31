var map, latitud, longitud;
function initMap() {
var geocoder = new google.maps.Geocoder;
var infowindow = new google.maps.InfoWindow;

map = new google.maps.Map(document.getElementById('map', centro),{
	center: centro,
	zoom: 13
});

google.maps.event.addListener(map, 'click', function(event)){
	latitud = event.latLng.lat();
	longitud = event.latLng.lng();
	document.getElementById('latitud').value=latitud;
	document.getElementById('longitud').value=longitud;
});
}