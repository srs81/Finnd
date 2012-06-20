var INTERVAL = 20000;

function updatePos() {
    $.ajax( fdAjaxUrl, function (data) {
      $("#updated").html(data);
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
        $("#updated").html(data);
      });
}
function errorFunction(position) {
    alert('Error trying to get your location!');
}
setInterval(updatePos, INTERVAL);
