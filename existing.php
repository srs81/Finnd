<? $fdSession = $_GET['session']; ?>
<div id="sharebutton">Share this session</div>
<div id="shareurl">
<? echo "http://" . $_SERVER['HTTP_HOST'] . '/?session=' . $fdSession ?>
</div>

<p id="updated"></p>

<script type="text/javascript">
var fdAjaxUrl = "location.php?session=<?php echo $fdSession ?>";
var fdName = "<?php echo $fdName ?>";
</script>

<script src="finnd.js"></script>

<a href="leave_session.php">Leave session</a>
