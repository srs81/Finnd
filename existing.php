<link href="map.css" rel="stylesheet" type="text/css" />
<? $fdSession = $_GET['session']; ?>
<div id="sharebutton">Share this session</div>
<div id="shareurl">
<? echo "http://" . $_SERVER['HTTP_HOST'] . '/?session=' . $fdSession ?>
</div>

<p id="updated"></p>
<div id="map_canvas"></div>

<script type="text/javascript">
var fdAjaxUrl = "location.php?session=<?php echo $fdSession ?>";
var fdName = "<?php echo $fdName ?>";
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="finnd.js"></script>

<a href="leave_session.php">Leave session</a>
