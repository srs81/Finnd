var INTERVAL = 3000;

var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
var myOptions = {
      zoom: 18,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

function updatePos() {
    $.ajax( fdAjaxUrl, function (data) {
      objs = $.parseJSON(data);
      var locs;
      var users = "";
      $.each(objs, function(key, value) {
        locs = value.split(",");
        users += key + ", "
        new google.maps.Marker({
          position: new google.maps.LatLng(locs[0], locs[1]), 
          map: map,
          title: key
        });   
      });
      $("#updated").html("Current users: " + users);
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
    var lat, lon;
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    $.post( fdAjaxUrl, { name: fdName, latitude: lat, longitude: lon }, 
      function (data) {
      objs = $.parseJSON(data);
      var locs;
      var users = "";
      $.each(objs, function(key, value) {
        locs = value.split(",");
        users += key + ", "
        new google.maps.Marker({
          position: new google.maps.LatLng(locs[0], locs[1]), 
          map: map,
          title: key
        });   
      });
      $("#updated").html("Current users: " + users);
      map.setCenter(new google.maps.LatLng(locs[0], locs[1]));
      });
}
function errorFunction(position) {
    alert('Error trying to get your location!');
}
setInterval(updatePos, INTERVAL);
