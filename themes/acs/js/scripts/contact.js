$(".address-section").each(function() {
	var el = $(this);
	var speed = 300;
	var map = false;
	var mapBox = el.find(".map");
	var addressBox = el.find(".address-box");

	// a method of the address slider available outside of it
	jQuery.fn.extend({
		moveSlider: function(pageNumber, fast) {
			var pageSize = $(this).width();
			var content = $(this).find(".slider-content");
			var pos = -(pageNumber * pageSize);
			if (fast) {
				content.css("left", pos + "px");
			} else {
				content.stop(true, true).animate({left: pos + "px"}, speed);
				var currentLocation = $(this).find(".slider-item").eq(pageNumber);
				if (currentLocation && currentLocation.data("lat") && currentLocation.data("lng")) {
					if (map) {
						var lat = currentLocation.data("lat");
						var lng = currentLocation.data("lng");
						var point = new google.maps.LatLng(lat, lng);
						map.currentCenter = point;
						map.setCenter(point);
						map.setZoom(15);
					}
				}
			}
		}
	});

	// standard slider functionality
	$(".slider").each(function() {
		var slider = $(this);
		var next = slider.find(".next");
		var prev = slider.find(".prev");
		var itemsPerPage = slider.data("ipp") ? slider.data("ipp") : 1;
		var page = 0;
		var maxPage = Math.ceil(slider.find(".slider-item").length / itemsPerPage) - 1;
		var addrSetters = slider.find(".find-location");
		var items = slider.find(".slider-item");

		next.click(function(event) {
			event.preventDefault();
			if (page < maxPage) {
				page ++;
				slider.moveSlider(page);
			}
		});

		prev.click(function(event) {
			event.preventDefault();
			if (page > 0) {
				page --;
				slider.moveSlider(page);
			}
		});

		// touch events
	 	slider.hammer().on("swipeleft", function() {
	 		next.click();
	 	});
	 	slider.hammer().on("swiperight", function() {
	 		prev.click();
	 	});

		$(window).bind("load resize", function() {
			slider.moveSlider(page, true);
		});

		addrSetters.click(function(event) {
			event.preventDefault();
			event.stopPropagation();
			var pageNumber = $(this).data("slide");
			addressBox.moveSlider(pageNumber);
		})

		items.click(function(){
			$(this).find("a").click();
		})
	});

	// building the map
	mapBox.each(function(){
		var mapEl = $(this);
		var mapId = mapEl.attr("id");
		var markerData = mapEl.data("markers");
		var latitude = mapEl.data("centerlat");
		var longitude = mapEl.data("centerlng");
		var mapDefaultCenter = new google.maps.LatLng(latitude, longitude);
		var markerIcon = mapEl.data("marker");
		var mapStyle = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"labels.text","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#ccdde8"},{"visibility":"on"}]}];

		var is_touch_device = 'ontouchstart' in document.documentElement;
		var draggable = is_touch_device ? false : true;
	
		var mapOptions = {
			center: mapDefaultCenter,
			zoom: 13,
			disableDefaultUI: true,
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.LARGE
			},
			mapTypeControl: true,
		    mapTypeControlOptions: {
		      style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
		    },
		    panControl: true,
			streetViewControl: true,
			overviewMapControl: true,
			scaleControl: true,
			scrollwheel: false,
			styles: mapStyle,
			draggable: draggable
		}
		map = new google.maps.Map(document.getElementById(mapId), mapOptions);
		map.markers = [];
		map.infoWindows = [];
		map.currentCenter = mapDefaultCenter;

		for(i = 0; i < markerData.length; i++) {
			var m = markerData[i];
			var markerLocation = new google.maps.LatLng(m.lat, m.lng);
			map.markers[i] = new google.maps.Marker({
				map: map,
				position: markerLocation,
				icon: markerIcon,
				title: m.text
			});
			//creating tooltip for each marker
		 	m.infoWindow = new google.maps.InfoWindow({
		     content :  m.text
		  }); 
		  
		  google.maps.event.addListener(map.markers[i], 'click', showAddress(m));
		}

    function showAddress(location) { 
      return function () { 
        location.infoWindow.open(map, this); 
      }; 
    }
		google.maps.event.addDomListener(window, 'resize', function() {
        map.setCenter(map.currentCenter);
      });
	});
})