@extends('home')

@section('style')
<style>
	.content {
    	height: 100vh;
	}
	#map{
		height: 100vh;
	}
  .probando{
    color:red;
  }
</style>
@endsection
@section('content')
<div id="map"></div>
@endsection

@section('script')
<script>
  var map;
  var infowindow;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -17.771688, lng: -63.186997},
      zoom: 14
    });
    infowindow = new google.maps.InfoWindow();
  }

  var position = {lat:-17.782698,lng:-63.164771};
  var dato = "<div class='probando'>texto</div>";
  var icon = {url:"{{ asset('/images/taxi.png') }}"};
  var markers = [];
  function putMarkerOnMap(position,icon,data){
    var marker = new google.maps.Marker({position,map,icon});
    markers.push(marker);
    google.maps.event.addListener(marker,'click', function(){
      infowindow.setContent(data);
      infowindow.open(map,this);
    });
  }

  function Eliminar(){
    if(markers.length){
      markers.forEach ( e => {
        google.maps.event.clearListeners(e,'click');
        e.setMap(null);
      });
    }
    markers = [];
  }

  function getData(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var dato = JSON.parse(this.responseText);
          Eliminar();
          console.log(dato);
          dato.forEach( e => {
            console.log(e);
            putMarkerOnMap(e.position, e.icono, e.estado);
          });
        }
    };
    xmlhttp.open("GET", "{{ asset('api/getTaxis') }}", true);
    xmlhttp.send();
  }

  setInterval(getData, 4000);

  //BORRAR los eventos antes de traer los datos del mapa
  //var listenerHandle = google.maps.event.addListener(map, 'bounds_changed', function(){...});
  //google.maps.event.removeListener(listenerHandle);
</script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQpSqIQGBfgqvsTvSauHMW-5MzBfYAWcQ&callback=initMap">
</script>
@endsection