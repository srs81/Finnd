<?
include ("_header.php");

if (isset($_POST['setmyname'])) {
	$_SESSION['name'] = $_POST['setmyname'];
	$sessionu = isset($_GET['session']) ? $_GET['session'] : "";
	header ("Location: " . fdSessionUrl($sessionu));
}
?>

<form action="change_name.php<? echo $sessionu ?>" method="POST">
<input type="text" name="setmyname" value="<?php if (isset($_SESSION['name'])) { echo $_SESSION['name']; } ?>">
<input type="submit" value="Set my name">
</form>

<? include ("_footer.php"); ?>
