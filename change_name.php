<?
include ("_common.php");
if (isset($_POST['setmyname'])) {
	setcookie('name', $_POST['setmyname']);
	$sessionu = isset($_GET['session']) ? $_GET['session'] : "";
	header ("Location: " . fdSessionUrl($sessionu));
}
include ("_header.php");
?>

<p><i>Enter a name to use Finnd. 
<? if (strpos($fdName, "ser #") > 0) { ?>
You can also use the random, anonymous username we have created for you.
<? } ?>
</i></p>
<form action="change_name.php<? echo $sessionu ?>" method="POST">
<input type="text" name="setmyname" value="<?php if (isset($_COOKIE['name'])) { echo $_COOKIE['name']; } ?>">
<input type="submit" value="Set my name">
</form>

<? if (strpos($fdName, "ser #") > 0) { ?>
<p><i>Your browser will prompt you to share your location when you use Finnd. If you received a Finnd link from friend(s) you trust, you can share your location. Otherwise, you can close your browser window or exit Finnd.</i></p>
<? } ?>

<? include ("_footer.php"); ?>
