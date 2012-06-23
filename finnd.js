var INTERVAL = 3000;
var lat, lon;
var setCent = false;

var myOptions = {
      zoom: 14,
      mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
var markers = {};
var markersLoc = {};

function updatePos() {
    $("#message").html('').css({backgroundColor: 'transparent'});
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
          delete markers[k];
          $("#message").html(k + " left the session.").css({backgroundColor:'pink'}).slideDown();
        }
      }); 
      var count = 0;
      $.each(objs, function(key, value) {
        count++;
        users += key + ", "
        if (markersLoc[key]) {
          if (markersLoc[key] === value) {
            return true;
          }
        } else {
          $("#message").html(key + " joined the session.").css({backgroundColor: 'GreenYellow'}).slideDown();
        }
        if (markers[key]) { markers[key].setMap(null); }
        markersLoc[key] = value;

        locs = value.split(",");
        gLoc = new google.maps.LatLng(locs[0], locs[1])
        bounds.extend(gLoc);
        markers[key] = new google.maps.Marker({
          position: gLoc, map: map, title: key
        });   
      });
      $("#usersinfo").html(users);
      if (!setCent) {
        map.setCenter(new google.maps.LatLng(lat, lon));
        setCent = true;
      }
   });
}
//Check if browser supports W3C Geolocation API
if (navigator.geolocation) {
    navigator.geolocation.watchPosition(successFunction, errorFunction);
} else {
    $("#message").html('It appears that Geolocation, which is required for this web page application, is not enabled in your browser. Please use a browser which supports the Geolocation API.');
}
function successFunction(position) {
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    updatePos();
}
function errorFunction(position) {
    $("#message").html("We had an error obtaining your location! Please allow Finnd to see your location to use this application. Your location data is deleted when you leave the session.").css({backgroundColor:'pink'});
    map.setCenter(new google.maps.LatLng("43", "-78"));
}
$(function() {
  setInterval(updatePos, INTERVAL);
  $("#sharebutton").click(function(e) {
    e.preventDefault();
    $("#shareinfo").slideToggle();
  });
  $("#usersbutton").click(function(e) {
    e.preventDefault();
    $("#usersinfo").slideToggle();
  });
});
