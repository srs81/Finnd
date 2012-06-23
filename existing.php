<? $fdSession = $_GET['session']; ?>
<div>
<b><? echo $fdName ?></b> 
[<a href="change_name.php<? echo $sessionu ?>">Change</a>] |
<a href="#" id="sharebutton">Share</a> |
<a href="#" id="usersbutton">Current users</a>

<div id="usersinfo" class="info"></div>

<div id="shareinfo" class="info">Copy-paste and share this Finnd URL: 
<form><input type="text" value="<? echo "http://" . $_SERVER['HTTP_HOST'] . fdSessionUrl($fdSession) ?>" readonly="readonly" size="16">
</input></form> <br/>
Or tell your friends to enter this session number: <b><? echo $fdSession ?></b> on the finnd.us website.
</div>

<div id="message"></div>
<div id="map_canvas"></div>

<script type="text/javascript">
var fdAjaxUrl = "location.php?session=<?php echo $fdSession ?>";
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="finnd.js"></script>
