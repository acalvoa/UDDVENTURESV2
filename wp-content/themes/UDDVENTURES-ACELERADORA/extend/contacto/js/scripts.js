(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		var map;
		var myLatlng1;
		var myLatlng2;
		// DOM ready, take it away
		$(document).on('ready', function(){
			var mapOptions = {
	          center: { lat: -34.397, lng: 150.644},
	          zoom: 16
	        };
	        map = new google.maps.Map(document.getElementById('mapa'),
	        mapOptions);
	        myLatlng1 = new google.maps.LatLng(-33.4425404,-70.6261368);
			var marker1 = new google.maps.Marker({
		    	position: myLatlng1,
		    	map: map
			});
			myLatlng2 = new google.maps.LatLng(-36.821529,-73.0370327);
			var marker2 = new google.maps.Marker({
		    	position: myLatlng2,
		    	map: map
			});
			map.setCenter(myLatlng1);
		});
		$(".EXTEND_contacto .location1").on('click',function(){
			map.setCenter(myLatlng1);
			map.setZoom(16);
		});
		$(".EXTEND_contacto .location2").on('click',function(){
			map.setCenter(myLatlng2);
			map.setZoom(16);
		});
	});
	
})(jQuery, this);
