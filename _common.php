<?

function fdSessionUrl ($session) {
	if ($session === "") return "index.php";
	else return "index.php?session=$session";
}

?>
