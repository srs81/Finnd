<?php 
include ("_header.php");

if (isset($_GET['session'])) {
  include ("existing.php");
} else { 
  include ("create_join.php");
}

include ("_footer.php");
?>
