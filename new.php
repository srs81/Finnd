<?
include ("_common.php");
header( "Location: " . fdSessionUrl( base_convert(rand(1,10000000),10,16) ) );
?>
