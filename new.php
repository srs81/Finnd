<?
session_start();
include ("_common.php");
header( "Location: " . fdSessionUrl( uniqid() ) );
?>
