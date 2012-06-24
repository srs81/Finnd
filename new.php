<?
include ("_common.php");
header( "Location: " . fdSessionUrl( base_convert(rand(1,100000000),10,16) ) );
?>
