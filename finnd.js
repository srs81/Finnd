var INTERVAL = 3000;
var lat, lon;

var myOptions = {
      zoom: 18,
      mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
var markers = {};
var markersLoc = {};

function updatePos() {
    $("#updated").hide();
    var bounds = new google.maps.LatLngBounds();
    $.post( fdAjaxUrl, { latitude: lat, longitude: lon }, 
      function (data) {
      var locs; 
      var users = "";
      objs = $.parseJSON(data);
      $.each(markersLoc, function(k, v) {
        if (objs[k]) return true;
        if (markers[k]) { 
          markers[k].setMap(null);
          $("#updated").html(k + " left the session.").css({backgroundColor:'pink'}).slideDown();
        }
      }); 
      $.each(objs, function(key, value) {
        users += key + " "
        if (markersLoc[key]) 
          if (markersLoc[key] === value)  
            return true;
          else
            $("#updated").html(k + " joined the session.").css({backgroundColor: 'green'}).slideDown();
        if (markers[key]) { markers[key].setMap(null); }
        markersLoc[key] = value;

        locs = value.split(",");
        gLoc = new google.maps.LatLng(locs[0], locs[1])
        bounds.extend(gLoc);
        markers[key] = new google.maps.Marker({
          position: gLoc, map: map, title: key
        });   
      });
      if (markers.length > 1) {
        map.fitBounds(bounds);
      } else {
        map.setCenter(new google.maps.LatLng(lat, lon));
        map.setZoom(18);
      }
   });
}
//Check if browser supports W3C Geolocation API
if (navigator.geolocation) {
    navigator.geolocation.watchPosition(successFunction, errorFunction);
} else {
    $("#updated").html('It appears that Geolocation, which is required for this web page application, is not enabled in your browser. Please use a browser which supports the Geolocation API.').show();
}
function successFunction(position) {
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    updatePos();
}
function errorFunction(position) {
    $("#updated").html("We had an error obtaining your location! Please allow Finnd to see your location to use this application. Your location data is deleted when you leave the session.").css({backgroundColor:'pink'}).show();
    map.setCenter(new google.maps.LatLng("43", "-78"));
}
$(function() {
  setInterval(updatePos, INTERVAL);
  $("#sharebutton").click(function() {
    $("#shareinfo").slideToggle();
  });
});
