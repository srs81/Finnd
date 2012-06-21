<?
include ("_header.php");

if (isset($_POST['setmyname'])) {
	$_SESSION['name'] = $_POST['setmyname'];
	$sessionu = isset($_GET['session']) ? "?session=" . $_GET['session'] : "";
	header ("Location: " . fdSessionUrl($sessionu));
}
if (!isset($_SESSION['name'])) {
        $_SESSION['name'] = "User #" . rand(0,100);
	echo "<p><i>If this is your first time visiting Finnd, a random user name has been assigned to you.</i></p>";
}
?>

<form action="change_name.php<? echo $sessionu ?>" method="POST">
<input type="text" name="setmyname" value="<?php if (isset($_SESSION['name'])) { echo $_SESSION['name']; } ?>">
<input type="submit" value="Set my name">
</form>

<? include ("_footer.php"); ?>
