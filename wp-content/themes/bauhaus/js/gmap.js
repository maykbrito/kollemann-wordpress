"use strict";
var mapLocation = new google.maps.LatLng(parseFloat(jQuery('#map').data('lat')), parseFloat(jQuery('#map').data('lng'))); //change coordinates here

var marker;
var map;



if (jQuery('#map').length) {
    google.maps.event.addDomListener(window, 'load', initialize);
}
