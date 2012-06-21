var INTERVAL = 3000;
var lat, lon;

var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
var myOptions = {
      zoom: 18,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
var markers = {};
var markersLoc = {};

function updatePos() {
    var bounds = new google.maps.LatLngBounds();
    var locs; 
    $.post( fdAjaxUrl, { name: fdName, latitude: lat, longitude: lon }, 
      function (data) {
      var users = "";
      objs = $.parseJSON(data);
      $.each(objs, function(key, value) {
        users += key + ", "
        if (markersLoc[key]) 
          if (markersLoc[key] === value)  
            return true;
        markersLoc[key] = value;
        locs = value.split(",");
        gLoc = new google.maps.LatLng(locs[0], locs[1])
        bounds.extend(gLoc);
        if (markers[key]) { markers[key].setMap(null); }
        markers[key] = new google.maps.Marker({
          position: gLoc, 
          map: map,
          title: key
        });   
      });
      $("#updated").html("Current users: " + users);
//      map.fitBounds(bounds); 
      map.setCenter(new google.maps.LatLng(locs[0], locs[1]));
   });
}
//Check if browser supports W3C Geolocation API
if (navigator.geolocation) {
    navigator.geolocation.watchPosition(successFunction, errorFunction);
} else {
    alert('It appears that Geolocation, which is required for this web page application, is not enabled in your browser. Please use a browser which supports the Geolocation API.');
}
function successFunction(position) {
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    updatePos();
}
function errorFunction(position) {
    alert('Error trying to get your location!');
}
setInterval(updatePos, INTERVAL);
