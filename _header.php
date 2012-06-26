<? 
require_once ("_common.php");
$sessionu = "";
if (isset($_GET['session'])) {
	$sessionu = "?session=" . $_GET['session'];
}
if (!isset($_COOKIE['name'])) {
        $fdName = "User #" . rand(0,100);
        setcookie('name', $fdName);
	if ($sessionu === "") 
		header ("Location: /");
	else
		header ("Location: change_name.php$sessionu");
}

$fdName = $_COOKIE['name'];
?>
<html>
<head>
	<script src="jquery.js"></script>
	<style type="text/css">
	form { display: inline; clear: none }
	</style>
	<title>Finnd Us | Mobile Friend Location Finder</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width" >
<? if (strlen($sessionu) > 2) { ?>
	<meta name="robots" content="noindex,nofollow">
<? } ?>
</head>
<body>
	<? // Start header ?>
	<div id="header"><a href="/">Finnd</a></div>
	<?
	// End the header
	// Start main body
	?>
	<div id="container">


