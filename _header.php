<? session_start() ?>
<? include ("_common.php") ?>
<html>
<head>
	<script src="jquery.js"></script>
	<style type="text/css">
	form { display: inline; clear: none }
	</style>
	<title>Finnd</title>
</head>
<body>
	<? // Start header ?>
	<div id="header">
<? 
if (!isset($_SESSION['name'])) {
	$_SESSION['name'] = "User #" . rand(0,100);
}
$fdName = $_SESSION['name'];

$sessionu = "";
if (isset($_GET['session'])) {
	$sessionu = "?session=" . $_GET['session'];
}
?>
	<b><? echo $fdName ?></b> [<a href="change_name.php<? echo $sessionu ?>">Change Name</a>]
	</div>
	<?
	// End the header

	// Start main body
	?>
	<div id="container">


