<? 
require_once ("_common.php");
if (!isset($_COOKIE['name'])) {
	header ("Location: /change_name.php");
}
?>
<html>
<head>
	<script src="jquery.js"></script>
	<style type="text/css">
	form { display: inline; clear: none }
	</style>
	<title>Finnd</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width" >
</head>
<body>
<? 
$fdName = $_COOKIE['name'];

$sessionu = "";
if (isset($_GET['session'])) {
	$sessionu = "?session=" . $_GET['session'];
}
?>
	<? // Start header ?>
	<div id="header">Finnd</div>
	<?
	// End the header
	// Start main body
	?>
	<div id="container">


