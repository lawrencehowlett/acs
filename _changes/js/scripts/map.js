// inserting the google map. Location is based on the data-lat and data-lng parameters of the map html element

$(".map-holder").each(function(){
	var mapHolder = $(this);
	var mapId = mapHolder.attr("id");
	var lat = mapHolder.data("lat");
	var lng = mapHolder.data("lng");
	var markerIcon = mapHolder.data("marker");

	var thePoint = new google.maps.LatLng(lat, lng);
	
	var mapOptions = {
		center: thePoint,
		zoom: 15,
		mapTypeControl: false,
		streetViewControl: false,
		overviewMapControl: false,
		scaleControl: false,
		scrollwheel: false
	};	
	var map = new google.maps.Map(document.getElementById(mapId), mapOptions);
	var marker = new google.maps.Marker({
		position: thePoint,
		map: map,
		animation: google.maps.Animation.DROP,
		icon: markerIcon
	});
	map.set("styles", [{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]);
});