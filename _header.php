<? 
require_once ("_common.php");
$sessionu = "";
if (isset($_GET['session'])) {
	$sessionu = "?session=" . $_GET['session'];
}
if (!isset($_COOKIE['name'])) {
        setcookie('name', "User #" . rand(0,100));
        header ("Location: /change_name.php" . $sessionu);
}
$fdName = $_COOKIE['name'];
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
	<? // Start header ?>
	<div id="header">Finnd</div>
	<?
	// End the header
	// Start main body
	?>
	<div id="container">


