<?

function fdSessionUrl ($session) {
	if ($session === "") return "/";
	else return "/$session";
}

?>
