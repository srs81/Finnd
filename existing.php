<? $fdSession = $_GET['session']; ?>
<div>
<b><? echo $fdName ?></b> 
[<a href="change_name.php<? echo $sessionu ?>">Change Name</a>] |
<a href="#" id="sharebutton">Share this Finnd</a>

<div id="shareinfo">Copy-paste and share this Finnd URL: 
<form><input type="text" value="<? echo "http://" . $_SERVER['HTTP_HOST'] . fdSessionUrl($fdSession) ?>" readonly="readonly" size="18">
</input></form> <br/>
Or tell your friends to enter this session number: <b><? echo $fdSession ?></b> on the finnd.us website.
</div>

<p id="updated"></p>
<div id="map_canvas"></div>

<script type="text/javascript">
var fdAjaxUrl = "location.php?session=<?php echo $fdSession ?>";
var fdName = "<?php echo $fdName ?>";
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="finnd.js"></script>

<a href="index.php">Leave session</a>
