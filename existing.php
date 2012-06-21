<? $fdSession = $_GET['session']; ?>
<b><? echo $fdName ?></b> [<a href="change_name.php<? echo $sessionu ?>">Change Name</a>]

<div id="sharebutton">Finnd URL: 
<form><input type="text" value="<? echo "http://" . $_SERVER['HTTP_HOST'] . fdSessionUrl($fdSession) ?>" readonly="readonly" size="16">
</input></form>
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
