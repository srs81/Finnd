<?
$session = isset($_GET['session']) ? $_GET['session'] : "";
header ("Location: /" . $session);
?>
