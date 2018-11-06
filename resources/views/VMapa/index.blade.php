@extends('home')

@section('style')
<style>
	.content {
    	height: 100vh;
	}
	#map{
		height: 100vh;
	}
</style>
@endsection
@section('content')
<div id="map"></div>
@endsection

@section('script')
<script>
  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8
    });
  }
</script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyJPPlnIMOLp20Ef1LlTong8rYdTnaTXM&callback=initMap">
</script>
@endsection