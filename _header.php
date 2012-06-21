<? 
session_start();

$sessionu = "";
if (isset($_GET['session'])) {
	$sessionu = "?session=" . $_GET['session'];
}
if (!(isset($_SESSION['name']))) {
	header ("Location: /change_name.php$sessionu");
}
include ("_common.php");
$fdName = $_SESSION['name']; 
?>
<html>
<head>
	<script src="jquery.js"></script>
	<style type="text/css">
	form { display: inline; clear: none }
	</style>
	<title>Finnd</title>
	<meta name="viewport" content="width=device-width" >
</head>
<body>
	<? // Start header ?>
	<div id="header">
	</div>
	<?
	// End the header

	// Start main body
	?>
	<div id="container">


